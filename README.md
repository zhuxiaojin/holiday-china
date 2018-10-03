# holiday-china

中国法定节假日判断

## 安装

```
$ composer require zhuxiaojin/holiday-china  
```

## 使用
```
$holiday=new Holiday();
// 获取某天数据
$holiday->holidayData('2018-10-03');
// 获取多天数据
$holiday->holidayDataList('2018-10-03,2018-10-04,2018-10-05');
```
## 参数说明
```
function holidayData($date);
int $date 你要查询的日期，不传默认为今天 格式2018-10-03
function holidayDataList($dates);
array $dates 批量查询的日期集合，必填参数，格式['2019-01-13','2018-04-12']

```
## laravel中使用
#### 参数注入
```
public function edit(HolidayChina $holiday){
$response=$holiday->holidayData('2018-10-09');
}
```
#### 服务调用
``` 
public function edit(){
$response=app('holiday')->holidayDataList('2018-09-10');
}
```
## 返回值
```
{"code":10001,"data":2}
```
data：工作日对应结果为 0, 休息日对应结果为 1, 节假日对应的结果为 2 
## 友情提示
该接口为第三方无偿提供，不限制调用次数，但是限于服务网络等原因，可能会出现延迟或无响应问题
推荐使用缓存结果信息
## 参考
http://timor.tech/api/holiday/
## License

MIT