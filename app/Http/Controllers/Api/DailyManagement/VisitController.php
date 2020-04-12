<?php

/*
 * @author weifan
 * Sunday 29th of March 2020 04:13:32 PM
 */

namespace App\Http\Controllers\Api\DailyManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DailyManagement\VisitRequest;
use App\Http\Service\DailyManagement\VisitService;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    protected $visitService;

    public function __construct(VisitService $visitService)
    {
        $this->visitService = $visitService;
    }

        /**
         * showdoc
         * @catalog 接口文档/日常管理/参观
         * @title 增加拜访记录
         * @description 增加拜访记录
         * @method POST  application/json
         * @url {{host}}/api/daily-management/visit
         * @param visitor true string  拜访人
         * @param phone true int 电话 
         * @param visit_time true date 访问时间 
         * @param member_name true string 要访问的人 
         * @param visit_reason true string 访问原因 
         * @param beds true string 访问床位
         * @json_param { "visitor": "第秀的", "phone": "17008208611", "visit_time": "1996-09-13 11:31:41", "member_name": "官玉兰", "visit_reason": "Vitae delectus dicta voluptatem aliquid accusamus molestias. Quasi et facilis esse laborum. Non cum repellat praesentium minus vel. Fuga esse non laboriosam voluptas omnis aut quidem.", "beds": "9号楼-9-141-434" }
         * @return { "status": 200, "message": "操作成功", "data": { "visitor": "第秀的", "phone": "17008208611", "visit_time": "1996-09-13 11:31:41", "member_name": "官玉兰", "visit_reason": "Vitae delectus dicta voluptatem aliquid accusamus molestias. Quasi et facilis esse laborum. Non cum repellat praesentium minus vel. Fuga esse non laboriosam voluptas omnis aut quidem.", "beds": "9号楼-9-141-434", "id": 21 } }
         * @return_param 和输入一样
         * @remark 备注
         */
    public function store(VisitRequest $request)
    {
        return $this->visitService->store($request->post());
    }

            /**
         * showdoc
         * @catalog 接口文档/日常管理/参观
         * @title 更新拜访记录
         * @description 更新拜访记录
         * @method PATCH  application/json
         * @url {{host}}/api/daily-management/visit
         * @param id true int 访问id
         * @param visitor false string  拜访人
         * @param phone false int 电话 
         * @param visit_time false date 访问时间 
         * @param member_name false string 要访问的人 
         * @param visit_reason false string 访问原因 
         * @param beds false string 访问床位
         * @json_param { "id":1, "visitor": "第秀的", "phone": "17008208611", "visit_time": "1996-09-13 11:31:41", "member_name": "官玉兰", "visit_reason": "Vitae delectus dicta voluptatem aliquid accusamus molestias. Quasi et facilis esse laborum. Non cum repellat praesentium minus vel. Fuga esse non laboriosam voluptas omnis aut quidem.", "beds": "9号楼-9-141-434" }
         * @return { "status": 200, "message": "操作成功", "data": { "id": 1, "visitor": "第秀的", "phone": "17008208611", "visit_time": "1996-09-13 11:31:41", "member_name": "官玉兰", "visit_reason": "Vitae delectus dicta voluptatem aliquid accusamus molestias. Quasi et facilis esse laborum. Non cum repellat praesentium minus vel. Fuga esse non laboriosam voluptas omnis aut quidem.", "beds": "9号楼-9-141-434" } }
         * @return_param 和输入一样
         * @remark 备注
         */
    public function update(VisitRequest $request)
    {
        return $this->visitService->update($request->all());
    }

        /**
         * showdoc
         * @catalog 接口文档/日常管理/参观
         * @title 查看拜访记录
         * @description 查看拜访记录
         * @method GET  application/json
         * @url {{host}}/api/daily-management/visit
         * @param page false int 当前页数
         * @param page_size false int 页面数据量
         * @param start_time false date 开始时间
         * @param end_time false date 结束时间
         * @param id false int 记录id
         * @json_param yl.test/api/daily-management/visit?start_time=1996-09-13 11:31:41&end_time=1996-09-13 11:31:41
         * @return { "status": 200, "message": "操作成功", "data": { "current_page": 1, "data": [ { "id": 1, "created_at": "1996-01-10 21:10:37", "updated_at": "2020-04-06 02:49:12", "visitor": "第秀的", "phone": "17008208611", "visit_time": "1996-09-13 11:31:41", "member_name": "官玉兰", "visit_reason": "Vitae delectus dicta voluptatem aliquid accusamus molestias. Quasi et facilis esse laborum. Non cum repellat praesentium minus vel. Fuga esse non laboriosam voluptas omnis aut quidem.", "beds": "9号楼-9-141-434" }, { "id": 21, "created_at": "2020-04-12 10:21:59", "updated_at": "2020-04-12 10:21:59", "visitor": "第秀的", "phone": "17008208611", "visit_time": "1996-09-13 11:31:41", "member_name": "官玉兰", "visit_reason": "Vitae delectus dicta voluptatem aliquid accusamus molestias. Quasi et facilis esse laborum. Non cum repellat praesentium minus vel. Fuga esse non laboriosam voluptas omnis aut quidem.", "beds": "9号楼-9-141-434" } ], "first_page_url": "http://yl.test/api/daily-management/visit?page=1", "from": 1, "last_page": 1, "last_page_url": "http://yl.test/api/daily-management/visit?page=1", "next_page_url": null, "path": "http://yl.test/api/daily-management/visit", "per_page": 15, "prev_page_url": null, "to": 2, "total": 2 } }
         * @return_param 返回参数名 类型 说明
         * @remark 备注
         */
    public function show(Request $request)
    {
        return $this->visitService->show($request->get('page', 1),
            $request->get('page_size', 15),
            $request->get('id', ''),
            $request->get('start_time', ''),
            $request->get('end_time', ''));
    }

            /**
         * showdoc
         * @catalog 接口文档/日常管理/参观
         * @title 删除拜访记录
         * @description 删除拜访记录
         * @method DELETE  application/json
         * @url {{host}}/api/daily-management/visit/{id}
         * @param id true int 访问id
         * @json_param yl.test/api/daily-management/visit/1
         * @return { "status": 200, "message": "操作成功", "data": { "id": "1" } }
         * @return_param 和输入一样
         * @remark 备注
         */
    public function destroy($id)
    {
        return $this->visitService->destroy($id);
    }
}
