<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FacebookGroupService;
use App\Services\ConfessionDatabaseService;

class ConfessionController extends Controller
{
		public function add(Request $request){
			$confession = ConfessionDatabaseService::add_confession($request);

			session()->put('success','Added');

			return view('thankyouPage',['posts' => $confession->content]);
		}

		public function approve($confession_id){
			$data = ConfessionDatabaseService::approve_confession($confession_id);

			if($data === ConfessionDatabaseService::AUTH_ERR){
				return $this->message(-1,"ĐĂNG NHẬP ĐỂ TIẾP TỤC");
			}

			if($data === ConfessionDatabaseService::DELETED_ERR){
				return $this->message(-1,"ĐÃ XÓA CFS !");
			}

			$facebookGrService = new FacebookGroupService();
			$result = $facebookGrService->publishConfession($data->order,$data->confession->content);

			if($result == FacebookGroupService::PUBLISH_ERR){
				return $this->message(-1,"KHÔNG THỂ DUYỆT CFS !");
			}

			return $this->message(0,"DUYỆT THÀNH CÔNG !!");
		}

		public function delete($confession_id){
			$data = ConfessionDatabaseService::delete_confession($confession_id);

			if($data === ConfessionDatabaseService::AUTH_ERR){
				return $this->message(-1,"ĐĂNG NHẬP ĐỂ TIẾP TỤC");
			}

			return $this->message(0,"ĐÃ XÓA !");
		}

		public function complete_delete($confession_id){
			$data = ConfessionDatabaseService::complete_delete_confession($confession_id);

			if($data === ConfessionDatabaseService::AUTH_ERR){
				return $this->message(-1,"ĐĂNG NHẬP ĐỂ TIẾP TỤC");
			}

			return $this->message(0,"ĐÃ XÓA !");
		}

		public function recover($confession_id){
			$data = ConfessionDatabaseService::recover_confession($confession_id);

			if($data === ConfessionDatabaseService::AUTH_ERR){
				return $this->message(-1,"ĐĂNG NHẬP ĐỂ TIẾP TỤC");
			}

			return $this->message(0,"ĐÃ KHÔI PHỤC");
		}


		public function merge_confession_and_approve(Request $request){
			$checkedConfessionIDs = json_decode($request->checkedConfessionIDs);
			$message = "";

			foreach($checkedConfessionIDs as $id){
				$data = ConfessionDatabaseService::approve_confession($id);
				//please no bug here
				$_message = "#cfs".$data->order.'
				'.$data->confession->content;
				$message = $message.$_message.'
				';
			}

			$facebookGrService = new FacebookGroupService();
			$result = $facebookGrService->publishToPage($message);

			if($result == FacebookGroupService::PUBLISH_ERR){
				return $this->message(-1,"ĐĂNG NHẬP ĐỂ TIẾP TỤC");
			}

			return $this->message(0,"GỘP DUYỆT THÀNH CÔNG !");
		}

		private function message($message_code,$message){
			$pack = array('message_code' => $message_code,'message' => $message);
			return json_encode($pack);
		}
}
