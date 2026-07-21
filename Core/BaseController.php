<?php
// Core/BaseController.php

require_once __DIR__ . '/Response.php';

abstract class BaseController
{
    protected function input(): array
    {
        $raw = file_get_contents('php://input');
        $decoded = json_decode($raw, true);
        return $decoded ?? $_POST;
    }

    protected function handle(callable $action): void
    {
        try {
            $action();
        } catch (RuntimeException $e) {
            // Known/expected failures (DB errors, etc.) — safe message already set
            Response::error($e->getMessage(), 500);
        } catch (Throwable $e) {
            error_log('Unhandled error: ' . $e->getMessage());
            Response::error('An unexpected error occurred.', 500);
        }
    }
}