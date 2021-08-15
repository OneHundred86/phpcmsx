<?php include PHPCMS_PATH.'install/step/header.tpl.php';?>
<script type="text/javascript">
    $(document).ready(function() {
        $.formValidator.initConfig({autotip:true,formid:"install",onerror:function(msg){}});
        $("#username").formValidator({onshow:"2到20个字符，不含非法字符！",onfocus:"请输入用户名3至20位"}).inputValidator({min:3,max:20,onerror:"用户名长度应为3至20位"})
        $("#password").formValidator({onshow:"6到20个字符<font color='FFFF00'>（默认为 phpcms）</font>",onfocus:"密码合法长度为6至20位"}).inputValidator({min:6,max:20,onerror:"密码合法长度为6至20位"});
        $("#pwdconfirm").formValidator({onshow:"请再次输入密码",onfocus:"请输入确认密码",oncorrect:"两次密码相同"}).compareValidator({desid:"password",operateor:"=",onerror:"两次密码输入不同"});

        $("#adminpath").formValidator({onshow:"请输入后台登录地址",onfocus:"请输入后台登录地址",oncorrect:"格式正确"}).regexValidator({regexp:"adminpath",datatype:"enum",onerror:"5-13个字符,字母或数字组合，不可数字开头"})

        $("#email").formValidator({onshow:"请输入email",onfocus:"请输入email",oncorrect:"email格式正确"}).regexValidator({regexp:"email",datatype:"enum",onerror:"email格式错误"})

        $("#dbhost").formValidator({onshow:"数据库服务器地址, 一般为 localhost",onfocus:"数据库服务器地址, 一般为 localhost",oncorrect:"数据库服务器地址正确",empty:false}).inputValidator({min:1,onerror:"数据库服务器地址不能为空"});
    })
</script>
<div class="body_box">
    <div class="main_box">
        <div class="hd">
            <div class="bz a5"><div class="jj_bg"></div></div>
        </div>
        <div class="ct">
            <div class="bg_t"></div>
            <div class="clr">
                <div class="l">
                    <dl>
                        <dt>Phpcms X 维护资讯：</dt>
                        <dd><a href="https://www.phpcmsx.com" target="_blank">https://www.phpcmsx.com</a></dd>
                        <dt>Phpcms X 新版下载：</dt>
                        <dd><a href="https://rep.ue4.net/artrogue/PhpcmsV9_utf8.ue4Fix/releases" target="_blank">https://rep.ue4.net</a></dd>
                        <dt>社区讨论：</dt>
                        <dd><a href="https://bbs.phpcmsx.com" target="_blank">https://bbs.phpcmsx.com</a></dd>
                        <dt>疑难问题：</dt>
                        <dd><a href="http://shang.qq.com/wpa/qunwpa?idkey=9a6c9fa44295ad063c9e0f73deb39b25d878ba3dfb07d2039b3fbd75dc482eba" target="_blank">QQ讨论群 601033253</a></dd>
                    </dl>
                </div>
                <div class="ct_box nobrd i6v">
                    <div class="nr">
                        <form id="install" name="myform" action="install.php?" method="post">
                            <input type="hidden" name="step" value="6">

                            <fieldset>
                                <legend>填写数据库信息</legend>
                                <div class="content">
                                    <table width="100%" cellspacing="1" cellpadding="0" >
                                        <tr>
                                            <th width="20%" align="right" >数据库主机：</th>
                                            <td>
                                                <input name="dbhost" type="text" id="dbhost" value="<?php echo $hostname?>" class="input-text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据库端口：</th>
                                            <td><input name="dbport" type="text" id="dbport" value="<?php echo $port?>" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据库帐号：</th>
                                            <td><input name="dbuser" type="text" id="dbuser" value="<?php echo $username?>" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据库密码：</th>
                                            <td><input name="dbpw" type="password" id="dbpw" value="<?php echo $password?>" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据库名称：</th>
                                            <td><input name="dbname" type="text" id="dbname" value="<?php echo $database?>" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据表前缀：</th>
                                            <td><input name="tablepre" type="text" id="tablepre" value="<?php echo $tablepre?>" class="input-text" />  <img src="./images/help.png" style="cursor:pointer;" title="如果一个数据库安装多个phpcms，请修改表前缀" align="absmiddle" />
                                                <span id='helptablepre'></span></td>
                                        </tr>
                                        <tr>
                                            <th align="right">数据库字符集：</th>
                                            <td>
                                                <input name="dbcharset" type="radio" id="dbcharset" value="" <?php if(strtolower($charset)=='') echo ' checked="checked" '?>/>默认
                                                <input name="dbcharset" type="radio" id="dbcharset" value="gbk" <?php if(strtolower($charset)=='gbk') echo '  checked="checked" '?> <?php if(strtolower($charset)=='utf8') echo 'disabled'?>/>GBK
                                                <input name="dbcharset" type="radio" id="dbcharset" value="utf8" <?php if(strtolower($charset)=='utf8') echo '  checked="checked" '?> <?php if(strtolower($charset)=='gbk') echo 'disabled'?>/>utf8
                                                <input name="dbcharset" type="radio" id="dbcharset" value="latin1" <?php if(strtolower($charset)=='latin1') echo ' checked '?> />latin1
                                                <img src="./images/help.png" style="cursor:pointer;" title="如果Mysql版本为4.0.x，则请选择默认；&#10;如果Mysql版本为4.1.x或以上，则请选择其他字符集（一般选GBK）" align="absmiddle" />
                                                <span id='helpdbcharset'></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th align="right">启用持久连接：</th>
                                            <td><input name="pconnect" type="radio" id="pconnect" value="1"
                                                    <?php if($pconnect==1) echo '  checked="checked" '?>/>是&nbsp;&nbsp;
                                                <input name="pconnect" type="radio" id="pconnect" value="0"
                                                    <?php if($pconnect==0) echo '  checked="checked" '?>/>否
                                                <img src="./images/help.png" style="cursor:pointer;" title="如果启用持久连接，则数据库连接上后不释放，保存一直连接状态；如果不启用，则每次请求都会重新连接数据库，使用完自动关闭连接。" align="absmiddle" /><span id='helppconnect'></span>
                                                <span id='helptablepre'></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>填写帐号信息</legend>
                                <div class="content">
                                    <table width="100%" cellspacing="1" cellpadding="0">
                                        <tr>
                                            <th width="20%" align="right">后台登录口地址：</th>
                                            <td><input name="adminpath" id="adminpath" type="text" placeholder="设置后台登录地址" value="" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <td style="background:rgba(22,145,0,0.3);padding:5px" colspan="2"><strong>在您完成安装后，请务必牢记您的后台登录地址：</strong><br><?php echo $siteurl ?><span id="upt"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%" align="right">超级管理员帐号：</th>
                                            <td><input name="username" type="text" id="username" value="phpcms" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">管理员密码：</th>
                                            <td><input name="password" type="password" id="password" value="phpcms" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">确认密码：</th>
                                            <td><input name="pwdconfirm" type="password" id="pwdconfirm" value="phpcms" class="input-text" /></td>
                                        </tr>
                                        <tr>
                                            <th align="right">管理员E-mail：</th>
                                            <td><input name="email" type="text" id="email" class="input-text" />
                                                <input type="hidden" name="selectmod" value="<?php echo $selectmod?>" />
                                                <input type="hidden" name="testdata" value="<?php echo $testdata?>" />
                                                <input type="hidden" id="install_phpsso" name="install_phpsso" value="<?php echo $install_phpsso?>" />
                                        </tr>

                                    </table>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg_b"></div>
        </div>
        <div class="btn_box"><a href="javascript:history.go(-1);" class="s_btn pre">上一步</a><a href="javascript:void(0);"  onClick="checkdb();return false;" class="x_btn">下一步</a></div>
    </div>
</div>
</body>
</html>
<script language="JavaScript">
    <!--
    $("#adminpath").bind('input propertychange',function(){
        var result = $(this).val();
        $("span#upt").empty().append(result);
    })
    var errmsg = new Array();
    errmsg[0] = '您已经安装过PhpcmsX，系统会自动删除老数据！是否继续？';
    errmsg[2] = '无法连接数据库服务器，请检查配置！';
    errmsg[3] = '成功连接数据库，但是指定的数据库不存在并且无法自动创建，请先通过其他方式建立数据库！';
    errmsg[6] = '数据库版本低于Mysql 4.0，无法安装PhpcmsX，请升级数据库版本！';

    function checkdb()
    {
        var url = '?step=dbtest&dbhost='+$('#dbhost').val()+'&dbport='+$('#dbport').val()+'&dbuser='+$('#dbuser').val()+'&dbpw='+$('#dbpw').val()+'&dbname='+$('#dbname').val()+'&tablepre='+$('#tablepre').val()+'&sid='+Math.random()*5;
        $.get(url, function(data){
            if(data > 1) {
                alert(errmsg[data]);
                return false;
            }
            else if(data == 1 || (data == 0 && confirm(errmsg[0]))) {
                $('#install').submit();
            }
        });
        return false;
    }
    //-->
</script>