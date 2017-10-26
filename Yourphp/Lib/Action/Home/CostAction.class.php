<?php

if(!defined("Yourphp")) exit("Access Denied");
class CostAction extends BaseAction
{
    public function index()
    {
        $type = empty($_REQUEST['type']) ? 'in2015' : $_REQUEST['type'];
        switch ($type){
                case 'in2015':
//                        $title = LANG_ID == 1 ? '国内案件仲裁费用（自2015年1月1日起施行）' :
//                                    'Domestic Arbitration Case（effective as from Jan 1, 2015)';
                        $title = LANG_ID == 1 ? '自2017年9月6日起施行' : (LANG_ID == 2 ? 'effective as from Sep. 6, 2017':'自2017年9月6日起施行');
                        $name1 = LANG_ID == 1 ? '案件受理费' : 'Case acceptance fee';
                        $name2 = LANG_ID == 1 ? '案件处理费' : 'Case handling fee';
                        $name3 = LANG_ID == 1 ? '受处理费合计' : 'Total cost of treatment';
                        break;
                case 'in2012':
                        $title = LANG_ID == 1 ? '国内案件仲裁费用（自2012年1月1日起施行）' :
                                    'Domestic Arbitration Case（effective as from Jan 1, 2012)';
                        $name1 = LANG_ID == 1 ? '案件受理费' : 'Case acceptance fee';
                        $name2 = LANG_ID == 1 ? '案件处理费' : 'Case handling fee';
                        $name3 = LANG_ID == 1 ? '受处理费合计' : 'Total cost of treatment';
                        break;
                case 'out2015':
                        $title = LANG_ID == 1 ? '涉外案件仲裁费用（自2015年1月1日起施行）' :
                                    'Foreign Related Arbitration Case（effective as from Jan 1, 2015)';
                        $name1 = LANG_ID == 1 ? '案件立案费' : 'Case filing fee';
                        $name2 = LANG_ID == 1 ? '案件仲裁费' : 'Case arbitration fee';
                        $name3 = LANG_ID == 1 ? '费用合计' : 'Total cost';
                        break;
                case 'out2012':
                        $title = LANG_ID == 1 ? '涉外案件仲裁费用（自2012年1月1日起施行）' :
                                    'Foreign Related Arbitration Case（effective as from Jan 1, 2012)';
                        $name1 = LANG_ID == 1 ? '案件立案费' : 'Case filing fee';
                        $name2 = LANG_ID == 1 ? '案件仲裁费' : 'Case arbitration fee';
                        $name3 = LANG_ID == 1 ? '费用合计' : 'Total cost';
                        break;
                case 'dispute':
                        $title = LANG_ID == 1 ? '金融争议案件仲裁费用' : 'Arbitration fees for financial disputes';
                        $name1 = LANG_ID == 1 ? '案件立案费' : 'Case filing fee';
                        $name2 = LANG_ID == 1 ? '案件仲裁费' : 'Case arbitration fee';
                        $name3 = LANG_ID == 1 ? '费用合计' : 'Total cost';
                        break;
                default:
                        $title = '国内案件仲裁费用（自2015年1月1日起施行）';
                        $type = 'in2015';
                        break;
            }

            $this->assign('title',$title);
            $this->assign('name1',$name1);
            $this->assign('name2',$name2);
            $this->assign('name3',$name3);
            if(is_numeric($_REQUEST['money']) && $_REQUEST['money'] > 0){
                    $cost_result = self::$type($type,$_REQUEST['money']);
                    $this->assign('costResult',$cost_result);
            }
            $this->display("Cost:index");
        }
   
    public function m()
    {
        $type = empty($_REQUEST['type']) ? '' : $_REQUEST['type'];
        switch ($type){
                case 'in2015':
                        $title = LANG_ID == 1 ? '国内案件仲裁费用（自2015年1月1日起施行）' :
                                    'Domestic Arbitration Case（effective as from Jan 1, 2015)';
                        $name1 = LANG_ID == 1 ? '案件受理费' : 'Case acceptance fee';
                        $name2 = LANG_ID == 1 ? '案件处理费' : 'Case handling fee';
                        $name3 = LANG_ID == 1 ? '受处理费合计' : 'Total cost of treatment';
                        break;
                case 'in2012':
                        $title = LANG_ID == 1 ? '国内案件仲裁费用（自2012年1月1日起施行）' :
                                    'Domestic Arbitration Case（effective as from Jan 1, 2012)';
                        $name1 = LANG_ID == 1 ? '案件受理费' : 'Case acceptance fee';
                        $name2 = LANG_ID == 1 ? '案件处理费' : 'Case handling fee';
                        $name3 = LANG_ID == 1 ? '受处理费合计' : 'Total cost of treatment';
                        break;
                case 'out2015':
                        $title = LANG_ID == 1 ? '涉外案件仲裁费用（自2015年1月1日起施行）' :
                                    'Foreign Related Arbitration Case（effective as from Jan 1, 2015)';
                        $name1 = LANG_ID == 1 ? '案件立案费' : 'Case filing fee';
                        $name2 = LANG_ID == 1 ? '案件仲裁费' : 'Case arbitration fee';
                        $name3 = LANG_ID == 1 ? '费用合计' : 'Total cost';
                        break;
                case 'out2012':
                        $title = LANG_ID == 1 ? '涉外案件仲裁费用（自2012年1月1日起施行）' :
                                    'Foreign Related Arbitration Case（effective as from Jan 1, 2012)';
                        $name1 = LANG_ID == 1 ? '案件立案费' : 'Case filing fee';
                        $name2 = LANG_ID == 1 ? '案件仲裁费' : 'Case arbitration fee';
                        $name3 = LANG_ID == 1 ? '费用合计' : 'Total cost';
                        break;
                case 'dispute':
                        $title = LANG_ID == 1 ? '金融争议案件仲裁费用' : 'Arbitration fees for financial disputes';
                        $name1 = LANG_ID == 1 ? '案件立案费' : 'Case filing fee';
                        $name2 = LANG_ID == 1 ? '案件仲裁费' : 'Case arbitration fee';
                        $name3 = LANG_ID == 1 ? '费用合计' : 'Total cost';
                        break;
                default:
                        $title = '国内案件仲裁费用（自2015年1月1日起施行）';
                        $type = 'in2015';
                        break;
            }

            $this->assign('title',$title);
            $this->assign('name1',$name1);
            $this->assign('name2',$name2);
            $this->assign('name3',$name3);
            if(is_numeric($_REQUEST['money']) && $_REQUEST['money'] > 0){
                    $cost_result = self::$type($type,$_REQUEST['money']);
                    $this->assign('costResult',$cost_result);
            }
            layout(false);
            if(empty($_REQUEST['type'])){
                $this->display("Cost:m");
            }else{
                $this->display("Cost:mDetail");
            }
        }
   
	public static function dispute($type,$money){
            $cost_conf = require_once(APP_PATH.'Conf/cost.php');
            if(!isset($cost_conf[$type])){
                return false;
            }
            $conf = $cost_conf[$type];
            if($conf)foreach($conf as $v){
                if(($v['up'] == 0 || $v['up'] >= $money) && $v['down'] <= $money){
                    $cf = $v;
                    break;
                }
            }
            if($money <= 1000000){
                $CMoney = ($money-$cf["down"])*$cf["standard"];
                $CMoney = $CMoney < 5000 ? 5000 : $CMoney;
            }else{
                $CMoney = ($money-$cf["down"]-1)*$cf["standard"];
            }
            $CMoney = round($CMoney) + $cf['money'];
            $result = array('money' => $money,'shouli' => 10000,'chuli' => $CMoney,'all' => 10000 + $CMoney );
            return $result;
	}
   
        public static function out2015($type,$money){
            $cost_conf = require_once(APP_PATH.'Conf/cost.php');
            if(!isset($cost_conf[$type])){
                return false;
            }
            $conf = $cost_conf[$type];
            if($conf)foreach($conf as $v){
                if(($v['up'] == 0 || $v['up'] >= $money) && $v['down'] <= $money){
                    $cf = $v;
                    break;
                }
            }
            if($money <= 1000000){
                $CMoney = ($money-$cf["down"])*$cf["standard"];
                $CMoney = $CMoney < 10000 ? 10000 : $CMoney;
            }else{
                $CMoney = ($money-$cf["down"]-1)*$cf["standard"];
            }
            $CMoney = round($CMoney) + $cf['money'];
            $CMoney = $CMoney > 15000000 ? 15000000 : $CMoney;
            $result = array('money' => $money,'shouli' => 10000,'chuli' => $CMoney,'all' => 10000 + $CMoney );
            return $result;
        }
        public static function out2012($type,$money){
            $result = self::out2015($type, $money);
            return $result;
        }
        
        public static function in2015($type,$money){
            $cost_conf = require_once(APP_PATH.'Conf/cost.php');
            if(!isset($cost_conf[$type])){
                return false;
            }
            //受理费
            $conf_shou = $cost_conf[$type]['shou'];
            if($conf_shou)foreach($conf_shou as $v){
                if(($v['up'] == 0 || $v['up'] >= $money) && $v['down'] <= $money){
                    $csf = $v;
                    break;
                }
            }
            if($money <= 1000){
                $sMoney = 100;
            }else{
                $sMoney = ($money-$csf["down"]-1)*$csf["standard"];
            }
            $sMoney = round($sMoney) + $csf['money'];
            //处理费
            $conf_chu = $cost_conf[$type]['chu'];
            if($conf_chu)foreach($conf_chu as $v){
                if(($v['up'] == 0 || $v['up'] >= $money) && $v['down'] <= $money){
                    $ccf = $v;
                    break;
                }
            }
            if($money <= 200000){
                $cMoney = 6000;
            }else{
                $cMoney = ($money-$ccf["down"]-1)*$ccf["standard"];
            }
            $cMoney = round($cMoney) + $ccf['money'];
            $result = array('money' => $money,'shouli' => $sMoney,'chuli' => $cMoney,'all' => $sMoney + $cMoney );
            return $result;
        }
        public static function in2012($type,$money){
            $result = self::in2015($type, $money);
            return $result;
        }
        
}
?>