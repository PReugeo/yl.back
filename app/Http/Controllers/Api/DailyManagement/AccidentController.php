<?php

/*
 * @author weifan
 * Sunday 29th of March 2020 11:51:43 AM
 */

namespace App\Http\Controllers\Api\DailyManagement;

use App\Enum\CodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DailyManagement\AccidentRequest;
use App\Http\Service\DailyManagement\AccidentService;
use App\Model\Accident;
use App\Model\AccidentType;
use App\Model\Account;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;

class AccidentController extends Controller
{
    protected $accidentService;
    use ApiTraits;

    public function __construct(AccidentService $accidentService)
    {
        $this->accidentService = $accidentService;
    }

        /**
         * showdoc
         * @catalog 接口文档/日常管理/事故
         * @title 增加事故记录
         * @description 增加事故记录
         * @method POST  application/json
         * @url {{host}}/api/daily-management/accident
         * @param account_id true int  账户id
         * @param type_id true int 事故类型id
         * @param level_accident true tinyint(4) 事故等级, 0-轻微 1-一般　２-严重
         * @param occurrence_time true int(11) 发生时间
         * @param duty_personnel true varchar(128) 值班人员
         * @param head true varchar(32) 负责人
         * @param description true text 事故描述
         * @json_param { "member_name": "倪祥", "level_accident": "1", "type": "blanditiis", "occurrence_time": "2012-03-24 08:16:00", "duty_personnel": "岑智明", "head": "黎桂荣", "description": "Culpa id ipsa dolor doloribus eligendi." }
         * @return { "status": 200, "message": "操作成功", "data": { "id": 1 } }
         * @return_param id int 事故id
         * @remark 备注
         */
    public function store(AccidentRequest $request)
    {
        $data = $request->post();

        return $this->accidentService->store($data);
    }

        /**
         * showdoc
         * @catalog 接口文档/日常管理/事故
         * @title 删除事故
         * @description 删除一个记录
         * @method DELETE  application/json
         * @url {{host}}/api/daily-management/accident/{id}
         * @param id true int 事故id
         * @json_param yl.test/api/daily-management/accident/21
         * @return { "status": 200, "message": "操作成功", "data": { "id": "21" } }
         * @return_param id int 事故id
         * @remark 备注
         */
    public function destory($id)
    {
        return $this->accidentService->destory($id);
    }

        /**
         * showdoc
         * @catalog 接口文档/日常管理/事故
         * @title 更新事故
         * @description　更新事故
         * @method PATCH  application/json
         * @url {{host}}/api/daily-management/accident
         * @param id true int 事故id
         * @param account_id false int  账户id
         * @param type false varchar(128) 事故类型
         * @param level_accident false tinyint(4) 事故等级, 0-轻微 1-一般　２-严重
         * @param occurrence_time false int(11) 发生时间
         * @param duty_personnel false varchar(128) 值班人员
         * @param head false varchar(32) 负责人
         * @param description false text 事故描述
         * @json_param {"id": 1, "member_name": "齐东", "account_id": 13, "level_accident": "1", "type": "blanditiis", "occurrence_time": "2012-03-24 08:16:00", "duty_personnel": "岑智", "head": "黎桂荣", "description": "Culpa id ipsa dolor doloribus eligendi." }
         * @return { "status": 200, "message": "操作成功", "data": { "id": "1" } }
         * @return_param id int 事故id
         * @remark 备注
         */
    public function update(AccidentRequest $request) // 如果更新失败，说明数据重复
    {
        return $this->accidentService->update($request->all());
    }

        /**
         * showdoc
         * @catalog 接口文档/日常管理/事故
         * @title 查询事故
         * @description　查询事故
         * @method GET  application/json
         * @url {{host}}/api/daily-management/accident
         * @param page false int 当前页数
         * @param page_size false int 页面数据量
         * @param start_time false date 开始时间
         * @param end_time false date 结束时间
         * @param name false string 会员名
         * @param id false int 事故id
         * @json_param yl.test/api/daily-management/accident?start_time=2012-03-24 08:16:00&end_time=2016-01-20 10:03:29
         * @return { "status": 200, "message": "操作成功", "data": { "current_page": 1, "data": [ { "id": 1, "created_at": "2008-05-14 13:00:16", "updated_at": "2020-04-12 10:07:05", "account_id": 13, "level_accident": "一般", "type": "blanditiis", "occurrence_time": "2012-03-24 08:16:00", "duty_personnel": "岑智", "head": "黎桂荣", "description": "Culpa id ipsa dolor doloribus eligendi.", "account": { "id": 13, "created_at": "1976-07-29 01:32:24", "updated_at": "1976-07-29 01:32:24", "account_number": "A2442384", "member_number": "8941", "member_name": "齐东", "beds": "7号楼-6-412-593", "account_balance": "1410.61", "beds_cost": "525.75", "meal_cost": "267.77", "nursing_cost": "414.06", "other_cost": "353.51", "cd_card": "240111426465475017", "deposit": "136.79" } } ], "first_page_url": "http://yl.test/api/daily-management/accident?page=1", "from": 1, "last_page": 1, "last_page_url": "http://yl.test/api/daily-management/accident?page=1", "next_page_url": null, "path": "http://yl.test/api/daily-management/accident", "per_page": 15, "prev_page_url": null, "to": 1, "total": 1 } }
         * @return_param id int 事故id
         * @return_param account_id int  账户id
         * @return_param type_id varchar(128) 事故类型id
         * @return_param level_accident tinyint(4) 事故等级, 0-轻微 1-一般　２-严重
         * @return_param occurrence_time int(11) 发生时间
         * @return_param duty_personnel varchar(128) 值班人员
         * @return_param head varchar(32) 负责人
         * @return_param description text 事故描述
         * @remark 备注
         */
    public function index(Request $request)
    {
        return $this->accidentService->show(
            $request->get('page', 1),
            $request->get('page_size', 15),
            $request->get('start_time'),
            $request->get('end_time'),
            $request->get('name'),
            $request->get('id')
        );
    }

        /**
         * showdoc
         * @catalog 接口文档/日常管理/事故
         * @title 根据账户id查询事故
         * @description　查询事故
         * @method GET  application/json
         * @url {{host}}/api/daily-management/accident/7
         * @param id true int 用户id
         * @json_param yl.test/api/daily-management/accident/7
         * @return{ "status": 200, "message": "操作成功", "data": [ { "id": 7, "created_at": "2004-10-04 11:58:59", "updated_at": "2004-10-04 11:58:59", "account_number": "A9986996", "member_number": "6336", "member_name": "植翔", "beds": "6号楼-6-121-829", "account_balance": "3724.05", "beds_cost": "466.68", "meal_cost": "298.84", "nursing_cost": "711.82", "other_cost": "292.77", "cd_card": "401342704257061946", "deposit": "1142.83", "accidents": [ { "id": 2, "created_at": "2013-04-16 23:36:00", "updated_at": "2013-04-16 23:36:00", "account_id": 7, "level_accident": 1, "type_id": 3, "occurrence_time": 1161026454, "duty_personnel": "计晶", "head": "鲁强", "description": "Occaecati quo quibusdam odit ab eos." }, { "id": 4, "created_at": "1999-09-29 09:03:44", "updated_at": "1999-09-29 09:03:44", "account_id": 7, "level_accident": 2, "type_id": 4, "occurrence_time": 1176126268, "duty_personnel": "尹红霞", "head": "桑翼", "description": "Cumque ut dolor nulla deserunt." }, { "id": 6, "created_at": "2003-05-22 10:33:50", "updated_at": "2003-05-22 10:33:50", "account_id": 7, "level_accident": 1, "type_id": 1, "occurrence_time": 1012734132, "duty_personnel": "雷正业", "head": "栗帆", "description": "Quia sed neque nisi." }, { "id": 15, "created_at": "2008-06-02 16:01:07", "updated_at": "2008-06-02 16:01:07", "account_id": 7, "level_accident": 0, "type_id": 4, "occurrence_time": 473355874, "duty_personnel": "俞兰英", "head": "井桂香", "description": "Doloremque deserunt aspernatur alias ipsam." } ] } ] }
         * @return_param  **　**　下面为accidents包裹的内容
         * @return_param id int 事故id
         * @return_param account_id int  账户id
         * @return_param type_id varchar(128) 事故类型id
         * @return_param level_accident tinyint(4) 事故等级, 0-轻微 1-一般　２-严重
         * @return_param occurrence_time int(11) 发生时间
         * @return_param duty_personnel varchar(128) 值班人员
         * @return_param head varchar(32) 负责人
         * @return_param description text 事故描述
         * @remark 备注
         */
    public function show($id)
    {
        return $this->apiReturn(Account::where('id', $id)->with('Accidents')->get(), CodeEnum::SUCCESS);
    }

}
