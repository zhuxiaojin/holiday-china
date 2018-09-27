# holiday-china

中国法定节假日判断

## 安装

```shell
$ composer require zhuxiaojin/holiday-china  
```

## 使用
```
$holiday=new Holiday();
$holiday->holidayData(20181001);
```
## 参数说明
```
function holidayData($date);
int $date 你要查询的日期，不传默认为今天 务必保证8位,例如20181001

```
## laravel中使用
#### 参数注入
```
public function edit(HolidayChina $holiday){
$response=$holiday->holidayData(20180310);
}
```
#### 服务调用
``` 
public function edit(){
$response=app('holiday')->holidayData(20170921);
}
```
## 返回值
```
{"code":10001,"data":2}
```
data：工作日对应结果为 0, 休息日对应结果为 1, 节假日对应的结果为 2 

## 参考
http://api.goseek.cn/
## License

MIT