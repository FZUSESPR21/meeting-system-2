<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="mainPage.css" rel="stylesheet">
    <title>主页</title>
</head>
<body>
<?php
session_start();
$idd= $_SESSION['val'];    //直接输出全局变量val.
include ('usersee.php');
include ('bool.php');
if($b1==0)
    $xian1="none";
else $xian1="block";

if($b2==0)
    $xian2="none";
else $xian2="block";

if($b3==0)
    $xian3="none";
else $xian3="block";

 print <<<EOT
 <div class="main">
            <div class="container">
                <div class="topbar">
                        <div class="topleft">
                            <ul class="nav nav-pills">
                                <li class="active link">
                                        <a href="#" style="color:white;">会议首页</a>
                                </li>
                                <li class="link">
                                        <a href="#luntan" style="color:white;">分论坛详情</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="topright">
                             
                             <a href=" " class="btn btn-default login">
                             $username
                             </a>
                        </div>
                    </div>
                </div>
               <div class="row clearfix">
                    <div class="col-md-12 column">
                        <div class="bottombar">
                            <div class="jumbotron">
                                <div class="meetimg"></div>
                                <h1 style="font-weight: bold;">
                                    关于峰会
                                </h1>
                                <p style="text-indent: 2em;">
                                    中国人工智能安防峰会，现为中国最具影响力的「AI+安防」论坛。
                                </p>
                                <p style="text-indent: 2em;">
                                    本届峰会以「洗牌结束 格局重构」为主题。邀请经过五年商业剧变与人工智能洗礼，从近千家AI & 安防公司中突围，并成为引领行业下一个五年的15家最具生命力的企业，发表总结过去五年，展望未来五年的重要演讲。
                                </p>
                                    <p style="text-indent: 2em;">
                                    在前两届峰会中，我们已成为了海康威视、大华股份、华为安防、阿里城市大脑、腾讯优图、商汤、旷视等知名企业高管每年首度公布年度AI安防业务的第一会议平台。
                                </p>
                                    <p style="text-indent: 2em;">
                                    在本次峰会上，演讲企业将向行业首度解密他们奠定行业地位的产品、技术、业务方法论。
                                </p>
                                <!-- <p>
                                     <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                </p> -->
                            </div>
                        <hr>
                        <div class="row clearfix" id="luntan" >
                                <div style="display: $xian1" class="col-md-3 column" onclick="document.location.href='luntan.php?luntanid=1'">
                                    <div class="luntanimg1"></div>
                                    <h3>
                                        北京分论坛
                                    </h3>
                                    <hr>
                                    <ul>
                                        <li>
                                            09:20-09:55:联邦学习下的数据价值与模型安全
                                            杨强，国际人工智能联合会首位华人理事会主席，微众银行首席AI官
                                        </li>
                                        <li>
                                            09:55-10:20:赋能数字转型 服务千行百业
                                            李亚亚，海康威视EBG解决方案部总裁
                                        </li>
                                        <li>
                                            12:00-12:20：360以安全为基础的AI技术与应用
                                            邱召强，360城市安全集团副总裁，360视觉科技总经理
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div style="display: $xian2" class="col-md-3 column" onclick="document.location.href='luntan.php?luntanid=2'">
                                    <div class="luntanimg2"></div>
                                    <h3>
                                        福州分论坛
                                    </h3>
                                    <hr>
                                    <ul>
                                        <li>
                                            10:20-10:45：
                                            AI行业应用 产业升级
                                            殷俊，大华股份先进技术研究院院长
                                        </li>
                                        <li>
                                            10:45-11:10：
                                            AI安防与存储的变革
                                            孙煜， 西部数据智慧视频产品首席技术官
                                        </li>
                                        <li>
                                            11:10-11:35：
                                            AI驱动城市智能化变革
                                            朱鑫，商汤科技智慧城市事业群产品副总裁
                                        </li>
                                        <li>
                                            11:35-12:00：
                                            AI如何得到人民的好口碑
                                            姚华，宇视副总裁、首席架构师
                                        </li>
                                    </ul>
                                </div>
                                <div  style="display: $xian3" class="col-md-3 column" onclick="document.location.href='luntan.php?luntanid=3'">
                                    <div class="luntanimg3"></div>
                                    <h3>
                                        山西分论坛
                                    </h3>
                                    <hr>
                                    <ul>
                                        <li>
                                            13:40-14:10：
                                            Huawei HoloSens，点亮智能世界
                                            段爱国，华为机器视觉领域总裁
                                        </li>
                                        <li>
                                            14:10-14:35：
                                            城市大脑的条与块
                                            那正平，旷视副总裁
                                        </li>
                                        <li>
                                            14:35-15:00：
                                            人机协同，赋能智慧治理应用升级
                                            李夏风，云从科技安防行业部总经理
                                        </li>
                                        <li>
                                            15:00-15:25：
                                            安防新基建，AI芯驱智能
                                            王俊，比特大陆AI业务线CEO
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>


EOT;
 ?>
 </body>
</html>
