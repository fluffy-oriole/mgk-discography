<?php

abstract class BaseController {
    public function getContext() {
        return [];
    }

    abstract public function get();
}