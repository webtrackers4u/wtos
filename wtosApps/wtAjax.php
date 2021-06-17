<?php
session_start();
include('../wtosConfig.php'); // load configuration
include('os.php'); // load wtos Library
global $os, $site;
if($os->get('WT_member_login')=='OK'&&$os->post('WT_member_login')=='OK'){
    $order = $os->post("order");
    $mobile_no=trim($os->post('mobile_no'));
    $otp_pass=trim($os->post('otp_pass'));
    $name=trim($os->post('name'));
    ///First step
    if ($order=="proceed"){
        $exists = $os->mfa($os->mq("SELECT  *  FROM member WHERE mobile_no='$mobile_no'"));
        $res=["type"=>'proceed_res'];
        $res["new"]=false;
        if(!$exists){
            $dataToSave["mobile_no"] = $mobile_no;
            $os->save("member", $dataToSave);
            $exists = $os->mfa($os->mq("SELECT  *  FROM member WHERE mobile_no='$mobile_no'"));
            $res["new"] = true;
        }
        $res["message"] = "please enter password";
        echo json_encode($res);
        exit();
    }
    if ($order=="check_login"){
        $res = ["error"=>true];
        $exists = $os->mfa($os->mq("SELECt * FROM member WHERE mobile_no='$mobile_no' AND  otp_pass='$otp_pass'"));
        if ($exists){
            $res["error"] = false;
            $os->Login($exists);
        }
        echo json_encode($res);
        exit();
    }

    if ($order=="update_login"){
        $res = ["error"=>true];
        $exists = $os->mfa($os->mq("SELECT * FROM member WHERE mobile_no='$mobile_no'"));
        if ($exists){
            $dataToSave = [
                "name"=>$name,
                "otp_pass"=>$otp_pass
            ];
            $saver = $os->save("member", $dataToSave, "member_id", $exists["member_id"]);
            if($saver) {
                $res["error"] = false;
                $os->Login($exists);
            }
        }
        echo json_encode($res);
        exit();
    }
    exit();
}



if ($os->get("save_fcm_token")=="OK"){
    $token = $os->get("token");
    $dataToSave = [
        "fcm_token"=>$token
    ];
    if ($os->isLogin()){
        $member_id = $os->loggedUser()["member_id"];
        if($os->save("member", $dataToSave, "member_id", $member_id)){
            print "Successfully saved token";
        }
    }

    exit();
}


/*****
 * Notice Board
 */

if($os->get("fetch_recent_notice")=="OK"){
    $limit = $os->get("limit")>0?$os->get("limit"):10;

    ?>
    <?
    $notices = [
        "SHISHUSREE AWARD 2020 - State Award for Best Reporting on Child Rights.",
        "আমার মা সুপারহিরো [Last date of submission: 12th May, 2020]",
    ];
    $n =0;
    foreach($notices as $notice):$n++;?>
        <div class="uk-card uk-card-default uk-card-small uk-card-hover uk-position-relative uk-card-body  p-top-l p-bottom-l">
            <table style="border-collapse: collapse">
                <tr>
                    <td style="width: 35px" valign="top" class="p-top-s color-primary">
                        <span uk-icon="icon:file-pdf; ratio:1.5"></span>
                    </td>
                    <td class="p-left-m">
                        <h6 class="uk-margin-remove uk-text-normal p-top-s" style="line-height: 1.3"><?=$notice?>
                            <?if($n%2):?>
                                <span class="uk-text-small uk-text-danger uk-blink">New</span>
                            <?endif;?>
                        </h6>
                        <small class="m-top-m">19-10-2020</small>
                    </td>
                </tr>
            </table>
        </div>
    <?endforeach;?>
    <?
    exit();
}
/*****
 * Enquiry
 */
if ($os->get("WT_inquirySave")=="OK"){
    _d($_POST);
    exit();
}
?>

