<?php

namespace Zhuxiaojin\HolidayChina;

use GuzzleHttp\Client;
use Zhuxiaojin\HolidayChina\Exceptions\Exception;
use Zhuxiaojin\HolidayChina\Exceptions\HttpException;
use Zhuxiaojin\HolidayChina\Exceptions\InvalidArgumentException;

/**
 * Created by PhpStorm.
 * User: storm 朱晓进 qhj1989@qq.com
 * Date: 2018/9/27
 * Time: 上午10:10
 */
class Holiday
{
    const URL = 'http://api.goseek.cn/Tools/holiday';

    public function holidayData($date=false) {
        if (empty($date)) {
            $date = date('Ymd');
        }
        $date = intval($date);
        //  检测时间长度
        if (strlen($date) != 8) {
            throw new InvalidArgumentException("不是一个有效的参数:" . $date);
        }
        $query = array_filter([
            'date' => $date
        ]);
        try {
            $response = $this->getHttpClient()->get(self::URL, [
                'query' => $query
            ])->getBody()->getContents();
            return json_decode($response);
        } catch (Exception $e) {
            throw new \HttpException($e->getMessage(), $e->getCode(), $e);
        }

    }

    public function getHttpClient() {
        return new Client();
    }

}