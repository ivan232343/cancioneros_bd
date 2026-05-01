<?php
class base_config
{
    /**  variables privadas **/

    /** variables publicas **/
    /* ---base de datos--- */
    public $_motor = "mysql";
    public $_host = "localhost";
    public $_namedb;
    public $_user = "root";
    public $_upass = "300499";
    /* --------------------  */

    /* ---entorno--- */
    public $project_name = "cancioneros_bd";
    //envs disponibles -> "dev","pro","test"
    public $env = "dev";
    public $load_config  = ["parametros_base", "autoload", "database"];
    public $load_head = ["metadata", "header"];
    public $load_footer = ["footer"];
    public $load_function = ["basic_function", "web-helper"];
    public $master_app_dir = __DIR__ . "/../";
    public $master_public_dir = __DIR__ . "/../../src/";
    /* ---------------  */

    public function __construct()
    {
        $this->init_error_handling();
    }

    private function init_error_handling()
    {
        if ($this->env === "dev") {
            ini_set("display_errors", "1");
            error_reporting(E_ALL);
        } else {
            ini_set("display_errors", "0");
            error_reporting(E_ALL);
        }

        set_error_handler([$this, "handle_php_error"]);
        set_exception_handler([$this, "handle_exception"]);
        register_shutdown_function([$this, "handle_shutdown_error"]);
    }

    public function handle_php_error($errno, $errstr, $errfile, $errline)
    {
        if (!(error_reporting() & $errno)) {
            return false;
        }

        $this->render_pretty_error($errno, $errstr, $errfile, $errline);
        return true;
    }

    public function handle_exception($exception)
    {
        $this->render_pretty_error(
            E_ERROR,
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine()
        );
    }

    public function handle_shutdown_error()
    {
        $error = error_get_last();
        if (!$error) {
            return;
        }

        $fatal_errors = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR];
        if (in_array($error["type"], $fatal_errors, true)) {
            $this->render_pretty_error(
                $error["type"],
                $error["message"],
                $error["file"],
                $error["line"]
            );
        }
    }

    private function get_error_label($type)
    {
        $labels = [
            E_ERROR => "Fatal Error",
            E_WARNING => "Warning",
            E_PARSE => "Parse Error",
            E_NOTICE => "Notice",
            E_CORE_ERROR => "Core Error",
            E_COMPILE_ERROR => "Compile Error",
            E_USER_ERROR => "User Error",
            E_USER_WARNING => "User Warning",
            E_USER_NOTICE => "User Notice",
            E_RECOVERABLE_ERROR => "Recoverable Error",
            E_DEPRECATED => "Deprecated",
            E_USER_DEPRECATED => "User Deprecated"
        ];

        return isset($labels[$type]) ? $labels[$type] : "PHP Error";
    }

    private function render_pretty_error($type, $message, $file, $line)
    {
        $label = $this->get_error_label($type);
        $safe_message = htmlspecialchars((string) $message, ENT_QUOTES, "UTF-8");
        $safe_file = htmlspecialchars((string) $file, ENT_QUOTES, "UTF-8");
        $safe_line = (int) $line;

        $http_500_types = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR, E_RECOVERABLE_ERROR];
        if (in_array($type, $http_500_types, true)) {
            http_response_code(500);
        }

        if ($this->env !== "dev") {
            echo '<div style="margin:20px auto;max-width:760px;padding:18px 20px;border-radius:10px;border:1px solid #ffd9d9;background:#fff3f3;color:#7a1f1f;font-family:Segoe UI,Arial,sans-serif">';
            echo '<strong style="display:block;font-size:18px;margin-bottom:8px">Ha ocurrido un error en la aplicacion.</strong>';
            echo '<span>Intenta nuevamente en unos minutos.</span>';
            echo '</div>';
            return;
        }

        echo '<div style="margin:20px auto;max-width:900px;border-radius:12px;border:1px solid #ffb3b3;background:#fff;font-family:Consolas,Segoe UI,monospace;overflow:hidden">';
        echo '<div style="padding:12px 16px;background:#b42318;color:#fff;font-weight:700">' . $label . '</div>';
        echo '<div style="padding:14px 16px;color:#111827">';
        echo '<p style="margin:0 0 10px 0;line-height:1.4"><strong>Mensaje:</strong> ' . $safe_message . '</p>';
        echo '<p style="margin:0 0 4px 0"><strong>Archivo:</strong> ' . $safe_file . '</p>';
        echo '<p style="margin:0"><strong>Linea:</strong> ' . $safe_line . '</p>';
        echo '</div>';
        echo '</div>';
    }

    /* ---herramientas--- */

    public function loader_top()
    {
        foreach ($this->load_config as $primary) {
            if (is_file($this->master_app_dir . "config/$primary.php")) {
                include_once $this->master_app_dir . "config/$primary.php";
            }
        }
    }
    public function loader_layouts(array $layout = [])
    {
        if (count($layout) == 0) {
            $layout = $this->load_head;
        }
        foreach ($layout as $primary) {
            if (is_file($this->master_app_dir . "view/layout/$primary.php")) {
                include_once $this->master_app_dir . "view/layout/$primary.php";
            }
        }
    }
    public function loader_function()
    {
        foreach ($this->load_function as $primary) {
            if (is_file($this->master_app_dir . "helper/$primary.php")) {
                include_once $this->master_app_dir . "helper/$primary.php";
            }
        }
    }
    /* ------------------- */
    /* ---indexacion--- */
    public function load_index($controlador, $accion)
    {
        $errores = new notfound();
        $controlador != "" ? $controlador : $controlador = CONTROLLER_DEFAULT;
        $accion != "" ?  $accion : $accion = ACTION_DEFAULT;

        //pasamos a una comprobacion de "/"
        $uri = explode("/", $controlador);
        if (is_array($uri) && count($uri) >= 2) {
            $controlador = $uri[0];
            if ($uri[1] != "") {
                $params = array($accion);
                $accion = $uri[1];
                $slashs = count($uri) - 2;
                if ($slashs >= 1) {
                    $_GET = array();
                    for ($i = 2; $i <= $slashs + 1; $i++) {
                        array_push($_GET, $uri[$i]);
                        array_push($params, $uri[$i]);
                    }
                }
            } else {
                $uri[0] = ACTION_DEFAULT;
            }
        }
        if (class_exists($controlador)) {
            $controlador  = new $controlador();
            if (method_exists($controlador, $accion)) {
                if (isset($params) && count($params) != 0) {
                    $controlador->$accion($params);
                } else {
                    $controlador->$accion();
                }
            } else {
                $errores->notFind($accion);
            }
        } else {
            $errores->notFind($controlador);
        }
    }
    /* ------------------- */
    /* ---app--- */
    public function run()
    {
        isset($_GET["a"]) ? $controlador = $_GET["a"] : $controlador = "";
        isset($_GET["b"]) ? $action = $_GET["b"] : $action = "";
        // puedes modificar el header a tu gusto si quieres pones diferentes headers
        $this->loader_layouts();
        // --------------------
        $this->load_index($controlador, $action);
        // --------------------
        // al igual que el footer 
        $this->loader_layouts(["footer"]);
    }
    /* --------- */
}

