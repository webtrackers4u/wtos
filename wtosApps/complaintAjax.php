<?php
session_start();
include('../wtosConfig.php'); // load configuration
include('os.php'); // load wtos Library
global $os, $site;
?><?php
if($os->get('get_district_by_state_by_pin')=='OK' && $os->post('get_district_by_state_by_pin')=='OK') {
    $pin_id=$os->post('pin_id');
    $district_id=$os->post('district_id');
    $pin=$os->post('pin');
    $pin=trim($pin);
    $record=array();
    if($pin!='') {
        $dataQuery=" select * from post_code   where post_code='$pin' limit 1 ";
        $rsResults=$os->mq($dataQuery);
        $record=$os->mfa($rsResults);
    }

    $district=$os->val($record, 'district');
    echo $district;
    echo '##';
    echo $district_id;
    ;
    exit();
}
if($os->get('upload_doc')=='OK'&&$os->post('upload_doc')=='OKS') {
    $image=$os->UploadPhoto('image', BASE_DIR.'upload_document');
    $doc_title=$os->post('doc_title');
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
    if($image!='') {
        $img_link='upload_document/'.$image;
    }
    $rand_no=rand(1, 10000);
    ?>
    <tr id="con_<?echo $rand_no;?>">
        <td style="width:50px; padding: 3px 0">
            <?if(explode("/", $file_type)[0]=="image") {?>
                <img src="<?echo BASE_URL.$img_link?>" style="width: 35px; height: 35px; object-fit: cover; border: 1px solid #e5e5e5">
            <?} else { ?>
                <div class="uk-flex uk-flex-middle uk-flex-center" style="height: 35px; width: 35px; font-size: 11px; color: var(--color-primary-dark); background-color: #fafafa; border: 1px solid #e5e5e5">
                <?= strtoupper(explode("/", $file_type)[1]);?>
                </div>
            <?}?>

        </td>
        <td style="line-height: 1" valign="middle">
            <?echo $doc_title?><br>
            <div >
                <small class="color-acent" style="font-size: 11px"><?= round($file_size/1024)."KB"?></small>
                &bull;
                <small class="color-acent" style="font-size: 11px"><?= strtoupper(explode("/", $file_type)[1])?></small>
            </div>
            <input type="hidden"  name="doc[<?echo $rand_no?>][doc_title]" class="uk-input uk-form-small" value="<?echo $doc_title?>" />
            <input type="hidden" name="doc[<?echo $rand_no?>][doc_url]" value="<?echo $img_link?>" />
        </td>
        <td style="width: 30px; text-align: right">
            <a style="color: red" href="javascript:void(0)"
               onclick="if(confirm('Are you sure?')){$('#con_<?echo $rand_no;?>').remove();}" uk-icon="close"></a>
        </td>
    </tr>
    <?exit;
}



if($os->get('WT_complaintEditAndSave')=='OK') {
    $complaint_id=$os->post('complaint_id');
    $dataToSave['applicant_name']=addslashes($os->post('applicant_name'));
    $dataToSave['applicant_father_husband']=addslashes($os->post('applicant_father_husband'));
    $dataToSave['applicant_age']=addslashes($os->post('applicant_age'));
    $dataToSave['applicant_gender']=addslashes($os->post('applicant_gender'));
    $dataToSave['applicant_address']=addslashes($os->post('applicant_address'));
    $dataToSave['applicant_ps']=addslashes($os->post('applicant_ps'));
    $dataToSave['applicant_dist']=addslashes($os->post('applicant_dist'));
    $dataToSave['applicant_pin']=addslashes($os->post('applicant_pin'));
    $dataToSave['applicant_contact']=addslashes($os->post('applicant_contact'));
    $dataToSave['applicant_email']=addslashes($os->post('applicant_email'));
    $member_id=$dataToSave['member_id']=addslashes($os->post('member_id'));
    $dataToSave['applicant_relationship_victim']=addslashes($os->post('applicant_relationship_victim'));
    $dataToSave['accused_name']=addslashes($os->post('accused_name'));
    $dataToSave['accused_father_husband']=addslashes($os->post('accused_father_husband'));
    $dataToSave['accused_age']=addslashes($os->post('accused_age'));
    $dataToSave['accused_gender']=addslashes($os->post('accused_gender'));
    $dataToSave['accused_address']=addslashes($os->post('accused_address'));
    $dataToSave['accused_ps']=addslashes($os->post('accused_ps'));
    $dataToSave['accused_dist']=addslashes($os->post('accused_dist'));
    $dataToSave['accused_pin']=addslashes($os->post('accused_pin'));
    $dataToSave['accused_contact']=addslashes($os->post('accused_contact'));
    $dataToSave['accused_email']=addslashes($os->post('accused_email'));
    $dataToSave['accused_organization']=addslashes($os->post('accused_organization'));
    $dataToSave['victim_name']=addslashes($os->post('victim_name'));
    $dataToSave['victim_guardian']=addslashes($os->post('victim_guardian'));


    $victim_dob_a=explode('-', $os->post('victim_dob'));
    $dataToSave['victim_dob']=$os->saveDate($victim_dob_a[2].'-'.$victim_dob_a[1].'-'.$victim_dob_a[0]);
    $dataToSave['victim_gender']=addslashes($os->post('victim_gender'));
    $dataToSave['victim_address']=addslashes($os->post('victim_address'));
    $dataToSave['victim_ps']=addslashes($os->post('victim_ps'));
    $dataToSave['victim_dist']=addslashes($os->post('victim_dist'));
    $dataToSave['victim_pin']=addslashes($os->post('victim_pin'));
    $dataToSave['victim_contact']=addslashes($os->post('victim_contact'));
    $dataToSave['victim_email']=addslashes($os->post('victim_email'));
    $dataToSave['victim_disabled']=addslashes($os->post('victim_disabled'));
    $dataToSave['victim_condition']=addslashes($os->post('victim_condition'));

    $incident_date_a=explode('-', $os->post('incident_date'));
    $dataToSave['incident_date']=$os->saveDate($incident_date_a[2].'-'.$incident_date_a[1].'-'.$incident_date_a[0]);
    $dataToSave['incident_place']=addslashes($os->post('incident_place'));
    $dataToSave['incident_place_recovery']=addslashes($os->post('incident_place_recovery'));
    $dataToSave['incident_other_details']=addslashes($os->post('incident_other_details'));
    $dataToSave['type_of_abuse']=addslashes($os->post('type_of_abuse'));
    $dataToSave['brief_summery']=addslashes($os->post('brief_summery'));
    $dataToSave['is_fir_lodged']=addslashes($os->post('is_fir_lodged'));
    $dataToSave['is_complain_against_officer']=addslashes($os->post('is_complain_against_officer'));
    $dataToSave['officer_name']=addslashes($os->post('officer_name'));
    $dataToSave['officer_designation']=addslashes($os->post('officer_designation'));
    $dataToSave['officer_other_details']=addslashes($os->post('officer_other_details'));
    $dataToSave['is_complained_other_org']=addslashes($os->post('is_complained_other_org'));
    $dataToSave['other_organization_name']=addslashes($os->post('other_organization_name'));
    $dataToSave['dont_want_to_disclose_identity']=addslashes($os->post('dont_want_to_disclose_identity'));
    $dataToSave['fir_no']=addslashes($os->post('fir_no'));
    $dataToSave['complaint_status']='Pending';
    $dataToSave['addedDate']=$os->now();






    $qResult=$os->save('complaint', $dataToSave, 'complaint_id', $complaint_id);///    allowed char '\*#@/"~$^.,()|+_-=:��
    //Member save section//

    // $dataToSave['complaint_no']=CONCAT('A/',DATE_FORMAT($os->now(), '%d%m%Y'),'/',$qResult);

    $os->mq("UPDATE complaint set complaint_no = CONCAT('A/',DATE_FORMAT(addedDate, '%d%m%Y'),'/',complaint_id) WHERE complaint_id='$qResult'");



    $dataToSave2['name']=addslashes($os->post('applicant_name'));
    $dataToSave2['guardian_name']=addslashes($os->post('guardian_name'));
    $dataToSave2['age']=addslashes($os->post('applicant_age'));
    $dataToSave2['gender']=addslashes($os->post('applicant_gender'));
    $dataToSave2['address']=addslashes($os->post('applicant_address'));
    $dataToSave2['ps']=addslashes($os->post('applicant_ps'));
    $dataToSave2['dist']=addslashes($os->post('applicant_dist'));
    $dataToSave2['pin']=addslashes($os->post('applicant_pin'));
    //$dataToSave2['mobile_no']=addslashes($os->post('applicant_contact'));
    $dataToSave2['email']=addslashes($os->post('applicant_email'));
    $os->save('member', $dataToSave2, 'member_id', $member_id);
    //end member save section//
    if($qResult) {
        if($complaint_id>0) {
            $mgs= "Record updated Successfully.";
        }
        if($complaint_id<1) {
            $mgs= "We have received your complaint. Please track your complaint.";
            $complaint_id=  $qResult;
        }
        $mgs=$complaint_id."#-#".$mgs;


        $document_a=$os->post('doc');
        if(is_array($document_a)&&count($document_a)>0) {
            $dataToSave3['dated']=$os->now();
            $dataToSave3['complaint_id']=$complaint_id;
            $dataToSave3['uploaded_by']=$member_id;
            $dataToSave3['forward_id']=0;
            $dataToSave3['note']='';
            $dataToSave3['doc_type']='Complaint Document';
            foreach ($document_a as  $value) {
                $dataToSave3['doc_url']=$value['doc_url'];
                $dataToSave3['doc_title']=$value['doc_title'];
                $os->save("upload_document", $dataToSave3);

            }
        }


        $image=$os->UploadPhoto('image_2', BASE_DIR.'upload_document');
        if($image!='') {
            $dataToSave4['doc_url']='upload_document/'.$image;
            $dataToSave4['doc_title']='DOB Supporting Doc';
            $dataToSave4['dated']=$os->now();
            $dataToSave4['uploaded_by']=$member_id;
            $dataToSave4['complaint_id']=$complaint_id;
            $dataToSave4['forward_id']=0;
            $dataToSave4['note']='';
            $dataToSave4['doc_type']='DOB Proved Document';
            $os->save("upload_document", $dataToSave4);
        }



    } else {
        $mgs="Error#-#Problem Saving Data.";
    }
    echo $mgs;
    exit();
}
