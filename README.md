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
$response=app('holiday')->holidayDataList(['2018-09-10']);
}
```
## 返回值
```
// 返回null说明不是
{
"code": 0,
"holiday": null
}
// holiday不为null,并且 holiday =false 说明该日期为节假日调休（补班）
{
    "code": 0,               // 0服务正常。-1服务出错
    "holiday": {
        "holiday": false,     // true表示是节假日，false表示是调休
        "name": "国庆前调休",  // 节假日的中文名。如果是调休，则是调休的中文名，例如'国庆前调休'
        "wage": 1,            // 薪资倍数，1表示是1倍工资
        "after": false,      // 只在调休下有该字段。true表示放完假后调休，false表示先调休再放假
        "target": '国庆节'    // 只在调休下有该字段。表示调休的节假日
    }
}


// holiday不为null,并且 holiday =true 说明该日期为节假日
{
    "code": 0,               // 0服务正常。-1服务出错
    "holiday": {
        "holiday": false,     // true表示是节假日，false表示是调休
        "name": "国庆前调休",  // 节假日的中文名。如果是调休，则是调休的中文名，例如'国庆前调休'
        "wage": 1,            // 薪资倍数，1表示是1倍工资
        "after": false,      // 只在调休下有该字段。true表示放完假后调休，false表示先调休再放假
        "target": '国庆节'    // 只在调休下有该字段。表示调休的节假日
    }
}
//如果是批量查询，则返回每一天的具体数据
{
    "code": 0,               // 0服务正常。-1服务出错
    "holiday": {             // 传过来的日期是什么，key就是什么。传多少个就有多少个。
        "2017-10-01": {      // holiday的值都是一致的
            "holiday": true,
            "name": "国庆节",
            "wage": 2
        },
        "2017-9-12": null    // 如果不是节假日，则为null
    }
}
```
## 友情提示
该接口为第三方无偿提供，不限制调用次数，但是限于服务网络等原因，可能会出现延迟或无响应问题
推荐使用缓存结果信息
## 参考
http://timor.tech/api/holiday/
## License

MIT