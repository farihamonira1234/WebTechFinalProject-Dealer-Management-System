<?php 
	session_start();
	require_once('../php/session_header.php');
	require_once('../service/companyService.php');


	//add company info
	if(isset($_POST['create'])){
		$id = $_POST['id'];
		$company_name = $_POST['company_name'];
		$profile_description = $_POST['profile_description'];
		$industry = $_POST['industry'];
		$company_website = $_POST['company_website'];
		$company_logo = $_FILES['company_logo']['name'];
		$user_account_id = $_POST['user_account_id'];

		if(empty($id) || empty($company_name) || empty($profile_description) || empty($industry) || empty($company_website) || $company_logo =="" || empty($user_account_id)){
			header('location: ../views/createcompanyinfo.php?error=null_error');
		}else{

			if(empty(getByID($id)['id']))
			{
				$check=explode('.', $company_logo);
				foreach ($check as $last) 
				{
					continue;
				}
				if ($last=='png' or $last=='jpg' or $last=='jpeg' or $last=='PNG' or $last=='JPG' or $last=='JPEG') 
				{
					$company = [
						'id'=> $id,
						'company_name'=> $company_name,
						'profile_description'=> $profile_description,
						'industry'=> $industry,
						'company_website'=>$company_website,
						'company_logo'=> '../upload/'.time().'.'.$last,
						'user_account_id'=>$user_account_id
					];

					$filedir='../upload/'.time().'.'.$last;
					move_uploaded_file($_FILES['company_logo']['tmp_name'],$filedir);

					$status = insert($company);

					if($status){
						header('location: ../views/all_company.php?success=done');
					}else{
						header('location: ../views/createcompanyinfo.php?error=db_error');
					}
				}
				else
					header('location: ../views/createcompanyinfo.php?error=img_error');
			}
			else
				header('location: ../views/createcompanyinfo.php?error=id_already_exist');
		}
	}

	//update user
	if(isset($_POST['edit'])){

		$id = $_POST['id'];
		$company_name = $_POST['company_name'];
		$profile_description = $_POST['profile_description'];
		$industry = $_POST['industry'];
		$company_website = $_POST['company_website'];
		$company_logo = $_POST['company_logo'];
		$user_account_id = $_POST['user_account_id'];

		if(empty($id) || empty($company_name) || empty($profile_description) || empty($industry) || empty($company_website) || empty($user_account_id) || empty($company_logo) ){
			header('location: ../views/editcompany.php?id={$id}');
		}else{

			$company = [
				'id'=> $id,
				'company_name'=> $company_name,
				'profile_description'=> $profile_description,
				'industry'=> $industry,
				'company_website'=>$company_website,
				'company_logo'=>$company_logo,
				'user_account_id'=>$user_account_id
			];

			$status = update($company);

			if($status){
				header('location: ../views/all_company.php?success=done');
			}else{
				header('location: ../views/editcompany.php?id={$id}');
			}
		}
	}

	//delete company info
	if(isset($_POST['yes'])){

		$id = $_POST['id'];
		$status = delete($id);

		if($status){
			header('location: ../views/all_company.php?success=done');
		}
	}
	elseif(isset($_POST['no']))
		header('location: ../views/all_company.php');

?>