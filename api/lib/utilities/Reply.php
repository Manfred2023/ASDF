<?php

use JetBrains\PhpStorm\NoReturn;

class Reply
{
    private const STATUS = 'status';
    private const RESPONSE = 'response';
    private const TYPE = 'type';
    private const MESSAGE = 'message';

    /**
     * @param $result
     * @return void
     */
    #[NoReturn] public static function _success($result): void
    {
        header('Content-Type: application/json');
        echo json_encode([
            self::STATUS => 1,
            self::TYPE => ("reference"),
            ((is_array($result) && !empty($result)) ? self::RESPONSE : self::MESSAGE) => $result]);
        exit();
    }
    
    /**
     * @param $result
     * @param int $code
     * @return void
     */
    static public function _error($result, int $code = 500): void
    {
        http_response_code($code);
        echo json_encode([self::STATUS => 0,
            ((is_array($result) && !empty($result)) ? self::RESPONSE : self::MESSAGE) => $result]);
        exit();
    }
    static public function _error_create($result, int $code = 409): void
    {
        http_response_code($code);
        echo json_encode([self::STATUS => 0,
            ((is_array($result) && !empty($result)) ? self::RESPONSE : self::MESSAGE) => $result]);
        exit();
    }
    static public function _error_field($result, int $code = 400): void
    {
        http_response_code($code);
        echo json_encode([self::STATUS => 0,
            ((is_array($result) && !empty($result)) ? self::RESPONSE : self::MESSAGE) => $result]);
        exit();
    }
    static public function _error_found($result, int $code = 404): void
    {
        http_response_code($code);
        echo json_encode([self::STATUS => 0,
            ((is_array($result) && !empty($result)) ? self::RESPONSE : self::MESSAGE) => $result]);
        exit();
    }
    /**
     * @param Exception $exception
     * @param int $code
     * @return void
     */
    static public function _exception(Exception $exception, int $code = 409): void
    {
        http_response_code($code);
        try {
            $message = $exception->getMessage();
            if (preg_match('/SQLSTATE/', $message, $matches) === 1) {

                if (preg_match('/for key /', $message, $matches) === 1) {
                    if (!empty($split = explode('for key ', $message)))
                        $message = str_replace("'", "", QString::_get($split[count($split) - 1]));
                } else {
                    if (!empty($split = explode(']', $message)))
                        $message = QString::_get($split[count($split) - 1]);
                }
            }
            if ($code != 401) echo json_encode([self::STATUS => 0, self::MESSAGE => $message]);
        } catch (Exception $e) {
            echo json_encode([self::STATUS => 0, self::MESSAGE => $e->getMessage()]);
        }
        exit();
    }

}