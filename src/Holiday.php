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

    /**
     * @name:holidayData 查询某一天的数据
     * @param bool $date
     * @return mixed
     * @author:Storm 朱晓进 <qhj1989@qq.com>
     * @throws \HttpException
     */
    public function holidayData($date = false) {
        $url = 'http://timor.tech/api/holiday/info/';
        if (empty($date)) {
            $date = date('Y-m-d');
        }
        try {
            $response = $this->getHttpClient()->get($url . $date)->getBody()->getContents();
            return json_decode($response);
        } catch (Exception $e) {
            throw new \HttpException($e->getMessage(), $e->getCode(), $e);
        }

    }

    /**
     * @name:holidayDataList  查询多天数据
     * @param array $days
     * @return mixed
     * @author:Storm 朱晓进 <qhj1989@qq.com>
     * @throws InvalidArgumentException
     * @throws \HttpException
     */
    public function holidayDataList($days = []) {
        $url = 'http://timor.tech/api/holiday/batch';
        if (!is_array($days)) {
            throw new InvalidArgumentException('请返回数组类型参数:' . $days);
        }
        $query = array_filter([
            'd' => implode(',', $days)]);

        try {
            $response = $this->getHttpClient()->get($url, ['query' => $query])->getBody()->getContents();
            return json_decode($response);
        } catch (Exception $e) {
            throw new \HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @name:getHttpClient  guzzle
     * @return Client
     * @author:Storm 朱晓进 <qhj1989@qq.com>
     */
    public function getHttpClient() {
        return new Client();
    }

}