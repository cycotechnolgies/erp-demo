<?php

namespace Core;

class Controller
{
    protected function view(string $path, array $data = [])
    {
        extract($data);
        require __DIR__ . "/../Views/" . $path . ".php";
    }
}
