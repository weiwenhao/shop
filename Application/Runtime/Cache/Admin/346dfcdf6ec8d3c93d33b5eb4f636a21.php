<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>管理中心 - <?php echo $_page_title;?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo $_page_btn_link;?>"><?php echo $_page_btn_name; ?></a></span>
    <span class="action-span1"><a href="#">管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo $_page_title;?> </span>
    <div style="clear:both"></div>
</h1>

<!--内容区域-->

<style>
    #ul_pic_list li{margin:10px;list-style-type:none;}
</style>
<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front" >通用信息</span>
            <span class="tab-back" >商品描述</span>
            <span class="tab-back" >会员价格</span>
            <span class="tab-back" >商品属性</span>
            <span class="tab-back" >商品相册</span>
        </p>
    </div>
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="/Admin/Goods/add.html" method="post">
            <!--基本信息-->
            <table width="90%" class="tab_table"  align="center">
                <tr>
                    <td class="label">商品品牌：</td>
                    <td>
                        <?php showSelect('brand_id','brand','brand_id','brand_name');?>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品主分类：</td>
                    <td>
                        <select name="cat_id" id="">
                            <option value="">请选择</option>
                            <?php foreach($cat_data as $k => $v):?>
                            <option value="<?php echo $v['cat_id'];?>">
                                <?php echo str_repeat('---/',$v['level']).$v['cat_name'];?>
                            </option>
                            <?php endforeach;?>
                        </select><span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品扩展分类：</td>
                    <td>
                        <input type="button" id="add_cat" value="添加一个">
                    </td>
                </tr>
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="goods_name" value=""size="30" />
                    <span class="require-field">*</span></td>
                </tr>
                <tr>
                    <td class="label">市场售价：</td>
                    <td>
                        <input type="text" name="market_price" value="0" size="20" />
                    </td>
                </tr>
                <tr>
                    <td class="label">本店售价：</td>
                    <td>
                        <input type="text" name="shop_price" value="0" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">促销价格：</td>
                    <td>
                        <input type="text" name="promote_price" value="0" size="20"/>
                    </td>
                </tr>
                <tr>
                    <td class="label">促销时间：</td>
                    <td>
                        <input type="text" class="promote_date" name="promote_start_date" value="0" size="20"/> 至
                        <input type="text" class="promote_date" name="promote_end_date" value="0" size="20"/>
                    </td>
                </tr>
                <tr>
                    <td class="label">是否上架：</td>
                    <td>
                        <input type="radio" name="is_onsale" checked="checked" value="是"/> 是
                        <input type="radio" name="is_onsale" value="否"/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">是否热卖：</td>
                    <td>
                        <input type="radio" name="is_hot" value="是"/> 是
                        <input type="radio" name="is_hot" checked="checked" value="否"/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">是否精品：</td>
                    <td>
                        <input type="radio" name="is_best" value="是"/> 是
                        <input type="radio" name="is_best" checked="checked" value="否"/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">是否新品：</td>
                    <td>
                        <input type="radio" name="is_new" value="是"/> 是
                        <input type="radio" name="is_new" checked="checked" value="否"/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">排序数字：</td>
                    <td>
                        <input type="text" name="sort_num" value="100" size="20"/>
                        <span>数字越小排名越靠前,每件商品数字间隔最好在10左右</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品图片：</td>
                    <td>
                        <input type="file" name="goods_img" size="35" />
                    </td>
                </tr>
            </table>
                <!--商品描述-->
            <table style="display:none;" width="100%" class="tab_table" align="center">
                <tr>
                    <td>
                        <textarea name="goods_desc" cols="40" rows="3" id="goods_desc" style="width:800px;height:240px;"></textarea>
                    </td>
                </tr>
            </table>

                <!--会员价格-->
            <table style="display:none;" width="90%" class="tab_table" align="center">
                <tr>
                    <td align="center">
                        <?php foreach($ml_data as $k => $v):?>
                            <p>
                                <?php echo $v['level_name'];?>:<input type="text" name="member_price[<?php echo $v['level_id']; ?>]" value="0" size="10" /><br>
                            </p>
                         <?php endforeach;?>
                    </td>
                </tr>
            </table>
                <!--商品属性-->
            <table style="display:none;" width="90%" class="tab_table" align="center">
                <tr>
                    <td id="add_attr">
                        <?php showSelect('type_id','type','type_id','type_name');?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul id="attr_list"></ul>
                    </td>
                </tr>
            </table>
                <!--商品相册-->
            <table style="display:none;" width="90%" class="tab_table" align="center">
                <tr>
                    <td>
                        <input type="button" id="add_pic" value="添加一张">
                        <hr>
                    </td>
                </tr>
                <tr id="pic_file">
                    <td align="center">

                    </td>
                </tr>
            </table>





            <div class="button-div">
                <input type="submit" value=" 确定 " class="button"/>
                <input type="reset" value=" 重置 " class="button" />
            </div>
        </form>
    </div>
</div>


<link href="/Public/umeditor1_2_2-utf8-php/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor1_2_2-utf8-php/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor1_2_2-utf8-php/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/umeditor1_2_2-utf8-php/lang/zh-cn/zh-cn.js"></script>

<!--引入时间插件-->
<link href="/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>
<script>
    //在需要的地方使用时间插件
    $.timepicker.setDefaults($.timepicker.regional['zh-CN']);//设置语言
    $(".promote_date").datetimepicker();
</script>

<script type="text/javascript">
    /*********************实例化在线编辑器***************************/
    var um = UM.getEditor('goods_desc',{
        initialFrameWidth:"100%",
        initialFrameHeight:"500",
    });

    /**********************点击切换table效果实现***************/
    //首先给给5个按钮分别添加点击事件
    $('#tabbar-div span').click(function () {
        var i = $(this).index();
        //先隐藏所有的class样式
        $('.tab_table').css('display','none');
        //显示点击的下表的队友table
        $('.tab_table:eq('+i+')').css('display','');
        //找到原来的tab-front,讲其改成 tab-back,然后将现在点击的class属性改为tab-front
        $('.tab-front').attr('class','tab-back');
        $(this).attr('class','tab-front');


    });

    /*****************添加相册事件*********************/
    //点击添加一张按钮创建 file框
    $('#add_pic').click(function () {
        //this代表当前节点的dom对象
        $('#pic_file td').append('<p><input type="file" name="pic[]"></p>'); //在td节点中追加
    });

    /*******************添加商品分类************************/
    $('#add_cat').click(function () {
        $(this).parent().append("<li><select name='ext_cat_ids[]'> <option value=''>请选择</option> <?php foreach($cat_data as $k => $v):?><option value=\"<?php echo $v['cat_id'];?>\"> <?php echo str_repeat('---/',$v['level']).$v['cat_name'];?></option> <?php endforeach;?></select></li>");
    });


    /***********************添加商品属性*****************************/
    $('#add_attr').find('select').change(function () {
        var ul = $('#attr_list');
        //清空ul下的html标签
        ul.html('');
        var str = '';
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'<?php echo U("getAttr","",FALSE)?>/type_id/'+$(this).val(),
            success:function (data) {
               //二维数组,拼接成  <li>[+]attr_name:select<li>
                $.each(data,function (k,v) {
                    str += '<li>';
                    if(v.attr_type == '可选'){
                        str += '<a href="#" onclick="add_self(this)">[+]</a>';
                    }
                    //拼接下拉框或者输入框,根据可选值来判断
                    if(v.attr_option_value == ''){
                        str += v.attr_name+':<input type="text" value="" name="attr_value['+v.attr_id+'][]"/>';
                    }else{
                        str += v.attr_name+':<select name="attr_value['+v.attr_id+'][]">';
                        str += '<option value="">请选择</option>';
                        //把字符串转化成数组
                        v.attr_option_value = v.attr_option_value.split(',');
                        $.each(v.attr_option_value,function (k,v) {
                            str += '<option value="'+v+'">';
                            str +=  v;
                            str += '</option>';
                        });
                        str += '</select>';
                    }
                    str += '</li>';
                })

                //字符串追加
                ul.append(str);
            }
        });

    });
    function add_self(a) {
        // $(a)  --> 把a转换成jquery中的对象，然后才能调用jquery中的方法
        // 先获取所在的li
        var li = $(a).parent();
        if($(a).text() == '[+]')
        {
            var newLi = li.clone();
            // +变-
            newLi.find("a").text('[-]');
            // 新的放在li后面
            li.after(newLi);
        }
        else
            li.remove();
    }

</script>

<!--页脚区域-->
<div id="footer">
    共执行 7 个查询，用时 0.028849 秒，Gzip 已禁用，内存占用 3.219 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>