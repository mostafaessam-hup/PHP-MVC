<?php


namespace View;


class View
{
    public static function make($view, $params = [])
    {
        $basecontent = self::getbasecontent();
        $viewcontent = self::getveiewcontent($view, params: $params);
        echo str_replace("{{content}}", $viewcontent, $basecontent);
    }
    protected static function getbasecontent()
    {
        ob_start();
        include base_path() . "Views/Layouts/main.php";
        return ob_get_clean();
    }
    public static function makeError($error)
    {

        self::getveiewcontent($error, true);
    }

    protected static function getveiewcontent($view, $isError = false, $params = [])
    {
        $path = $isError ? view_path() . "errors/" : view_path();
        if (str_contains($view, ".")) {
            $views = explode(".", $view);
            foreach ($views as $view) {
                if (is_dir($path . $view)) {
                    $path = $path . $view . "/";
                }
            }
            $view = $path . end($views) . ".php";
            // var_dump($view);
        } else {
            $view = $path . $view . ".php";
            // var_dump($view);
        }
        foreach ($params as $param => $value) {
            $$param = $value;
        }
        if ($isError) {
            // var_dump($view);
            include $view;
        } else {
            ob_start();
            include $view;
            return ob_get_clean();
        }
    }
}
