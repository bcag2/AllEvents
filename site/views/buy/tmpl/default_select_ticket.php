<?php
/*
 * @version %%ae3.version%%
 * @package %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license %%ae3.license%%
 * @author %%ae3.author%%
 * @access public
*/
//// no direct access

defined('_JEXEC') or die(';)');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

JHtml::_('behavior.formvalidation');
$user = JFactory::getUser();
$input = JFactory::getApplication()->input;

$mainframe = JFactory::getApplication();
$document = JFactory::getDocument();
$baseurl = JRoute::_(JUri::root() . 'index.php');
$maxperuserperticket = JText::_('JT_PERUSER_PER_PURCHASE_LIMIT_ERROR');
if (!$this->max_noticket_peruserperpurchase)
    $this->max_noticket_peruserperpurchase = 10;
$maxperuserperticket = str_replace('[MAXPERUSER_PERPURCHASE]', $this->max_noticket_peruserperpurchase, $maxperuserperticket);
$post = $input->post;
$session = JFactory::getSession();
$pagetitle = JText::sprintf('COM_ALLEVENTS_STEP_SELECT_TICKETS', $this->alleventdata->title);
$document->setTitle($pagetitle);
$show_ticket_description = $this->allevents_params->get('show_ticket_type_description');
$currency_display_format = str_replace(" ", "", $this->allevents_params->get('currency_display_format'));

if ($show_ticket_description) {
    $colspan = '4';
} else {
    $colspan = '3';
}

$ticketid = $session->get('sticketid');
if ($this->timezonestring['startdate'] == $this->timezonestring['enddate'])
    $datetoshow = $this->timezonestring['startdate'];
else
    $datetoshow = JText::_('COM_ALLEVENTS_FROM') . $this->timezonestring['startdate'] . JText::_('COM_ALLEVENTS_TO') . $this->timezonestring['enddate'];

if (!empty($this->timezonestring['eventshowtimezone']))
    $datetoshow .= '<br/>' . $this->timezonestring['eventshowtimezone'];

$flag = $session->get('JT_enableticket', '0');
$remaining = $session->get('JT_remaining_tickets');


$article_id = $this->article;
if (empty($article_id))
    $article_id = 0;

$copdisc = JText::_('COP_DISCOUNT');
$eachtypecntzero = 0;
$paideventype = 0;


$totavailable = $totcount = 0;
foreach ($this->eventtypedata as $type) {
    if (isset($type->count)) {
        $totcount = $type->count + $totcount;
    }

    $totavailable = $type->available + $totavailable;

}
?>
<script type="text/javascript">
    function checkforalpha(el) {
        var i = 0;
        for (i = 0; i < el.value.length; i++) {
            if ((el.value.charCodeAt(i) > 64 && el.value.charCodeAt(i) < 92) || (el.value.charCodeAt(i) > 96 && el.value.charCodeAt(i) < 123)) {
                alert("<?php echo JText::_('COM_ALLEVENTS_ENTER_NUMERICS'); ?>");
                el.value = el.value.substring(0, i);
                break;
            }
        }

        if (el.value < 0) {
            alert("<?php echo JText::_('COM_ALLEVENTS_ENTER_AMOUNT_GR_ZERO'); ?>");
        }

        if (el.value % 1 !== 0) {
            alert("<?php echo JText::_('COM_ALLEVENTS_ENTER_AMOUNT_INT'); ?>");
            el.value = 0;
            return false


        }
    }
</script>
<?php
$js = "
    var allevents_baseurl='" . $baseurl . "';
    ";
$js .= '
    jQuery(document).ready(function(){
    jQuery("#dis_cop").hide();
    });
    function show_cop(){
        techjoomla.jQuery("#dis_amt").show();
        var total_amt_inputbox = parseFloat(techjoomla.jQuery("#total_amt_inputbox").val());
        total_amt_inputbox = total_amt_inputbox.toFixed(2)
        techjoomla.jQuery("#net_amt_pay_inputbox").val(total_amt_inputbox);
        techjoomla.jQuery("#net_amt_pay").html(total_amt_inputbox);

        if(techjoomla.jQuery("#coupon_chk").is(":checked"))
        {
            total_calc_amt2=0;

            techjoomla.jQuery("input[class=\'input-small type_ticketcounts\']").each(function()
            {
                total_calc_amt2=parseFloat(total_calc_amt2)+parseFloat(techjoomla.jQuery(this).val())
            });

            if(total_calc_amt2==0)
            {
                alert("' . JText::_("COM_ALLEVENTS_NUMBER_OF_TICKETS") . '",true);
                document.getElementById("coupon_chk").checked = false;
                return;
            }

            document.getElementById("coup_button").removeAttribute("disabled");
            techjoomla.jQuery("#cop_tr").show();
            techjoomla.jQuery("#coupon_code").show();
            techjoomla.jQuery("#coup_button").show();
        }
        else
        {
            var totalamt=parseFloat(techjoomla.jQuery("#net_amt_pay_inputbox").val());
            totalamt = totalamt.toFixed(2);

            var allow_taxation=techjoomla.jQuery("#allow_taxation").val();
                if(allow_taxation==1)
                {
                    calculatetax(totalamt);

                }

            techjoomla.jQuery("#cop_tr").hide();
            techjoomla.jQuery("#coupon_code").hide();
            techjoomla.jQuery("#coup_button").hide();
            techjoomla.jQuery("#dis_amt").show();';

$js .= 'techjoomla.jQuery("#dis_cop_amt").html();';
$js .= 'techjoomla.jQuery("#dis_cop").hide(); ';
$js .= 'techjoomla.jQuery("#coupon_code").val("");
        }
    }
   ';


$js .= "

    var totalpricetoshow=0;
    function applycoupon()
    {
        document.getElementById('coup_button').setAttribute('disabled', 'disabled');

        if(techjoomla.jQuery('#coupon_chk').is(':checked'))
        {

            if(techjoomla.jQuery('#coupon_code').val()=='')
            {
                document.getElementById(\"coup_button\").removeAttribute(\"disabled\");
                alert(\"" . JText::_('ENTER_COP_COD', true) . "\");
            }
            else
            {
                techjoomla.jQuery.ajax(
                {
                    url:root_url+'?option=com_allevents&task=buy.getcoupon&coupon_code='+document.getElementById('coupon_code').value,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data)
                    {
                        amt=0;
                        val=0;

                        if(parseInt(data[0].error)==1)
                        {
                            alert(document.getElementById('coupon_code').value + \"" . JText::_('COP_EXISTS', true) . "\");
                            document.getElementById(\"coup_button\").removeAttribute(\"disabled\");
                            return;
                        }

                        if(parseFloat(data[0].value)>0)
                        {

                            if(data[0].val_type == 1)
                            {
                                val = (data[0].value/100)*document.getElementById('total_amt_inputbox').value;
                            }
                            else
                            {
                                val = data[0].value;
                            }

                            finalvar=0
                            techjoomla.jQuery('input[class=\"totalpriceclass\"]').each(function(){
                            finalvar=parseFloat(techjoomla.jQuery(this).val())+parseFloat(finalvar);
                        });

                        amt=parseFloat(finalvar)-parseFloat(val);

                        if(parseFloat(amt)<= 0)
                        {
                            amt=0;
                        }

                        if(isNaN(finalvar))
                        {

                            amt=0;
                        }

                        techjoomla.jQuery('#net_amt_pay_inputbox').val(amt)
                        techjoomla.jQuery('#net_amt_pay').html(amt);
                        var allow_taxation=techjoomla.jQuery('#allow_taxation').val();

                        if(allow_taxation==1)
                        {
                            calculatetax(amt);
                        }

                        techjoomla.jQuery('#dis_cop_amt').html(''+val);
                        techjoomla.jQuery('#dis_amt').show();
                        techjoomla.jQuery('#dis_cop').show();
                        }
                    }
                });
            }
        }

    }

    function calculatetax(amt)
    {
        techjoomla.jQuery.ajax(
        {
            url:root_url+'?option=com_allevents&task=buy.applytax&tmpl=component&total_calc_amt='+amt,
            type: 'GET',
            dataType: 'json',
            success: function(taxdata)
            {
                if(taxdata!=null  && parseFloat(taxdata.taxvalue)>0)
                {
                    techjoomla.jQuery('#order_tax').val(parseFloat(taxdata.taxvalue));
                    var taxamt=techjoomla.jQuery('#order_tax').val();
                    taxamt = parseFloat(taxamt)
                    taxamt = taxamt.toFixed(2);
                    techjoomla.jQuery('#tax_to_pay').html(taxamt);
                    techjoomla.jQuery('#tax_to_pay_inputbox').val(taxamt);
                    var net_amt_after_tax=parseFloat(taxamt)+parseFloat(amt)
                    net_amt_after_tax = net_amt_after_tax.toFixed(2);
                    techjoomla.jQuery('#net_amt_after_tax').html(net_amt_after_tax);
                    techjoomla.jQuery('#net_amt_after_tax_inputbox').val(net_amt_after_tax);
                    techjoomla.jQuery('#tax_tr').show();
                }
                else
                {
                    techjoomla.jQuery('#order_tax').val(0);
                    techjoomla.jQuery('#tax_to_pay').html(0);
                    techjoomla.jQuery('#tax_to_pay_inputbox').val(0);
                    var net_amt_after_tax=parseFloat(amt)
                    net_amt_after_tax = net_amt_after_tax.toFixed(2);
                    techjoomla.jQuery('#net_amt_after_tax').html(amt);
                    techjoomla.jQuery('#net_amt_after_tax_inputbox').val(amt);
                    techjoomla.jQuery('#tax_tr').hide();

                }


            }
        });

    }

    function round(n)
    {
        return Math.round(n*100+((n*1000)%10>4?1:0))/100;
    }

    function isNumberKeyWithDecimal(event,obj)
    {
        if ((event.keyCode >= 48 && event.keyCode <= 57))
        {

        }
        else
        {
            alert(\"" . JText::_('COM_ALLEVENTS_ENTER_NUMERICS') . "\");

            event.value=0;
            obj.value=0;

        }
       }


    function caltotal(avalble,totalpriceid,count,obj,unlimited,peruserlimit)
    {
        total_calc_amt2=0;

        techjoomla.jQuery('input[class=\'input-small type_ticketcounts\']').each(function()
        {
            total_calc_amt2=parseInt(total_calc_amt2)+parseInt(techjoomla.jQuery(this).val())
        });
        //If entered no of ticket is greater than no of tickets allowed
        if(parseInt(peruserlimit)< parseInt(total_calc_amt2))
        {
            alert('" . $maxperuserperticket . "');
            obj['value']=0;
            return;
        }

        //If entered no of ticket is greater than no of tickets allowed
        if((parseInt(unlimited)!=1))
        {

            if(parseInt(avalble)< parseInt(obj['value']))
            {
                alert(\"" . JText::_('ENTER_LESS_COUNT_ERROR', true) . "\");
                obj['value']=0;
                return;
            }
        }

        total_calc_amt=0;
        totalprice=count*parseFloat(obj['value']);

        if(isNaN(totalprice))
        totalprice=0;
        totalprice = totalprice.toFixed(2);
        techjoomla.jQuery('#ticket_total_price'+totalpriceid).html(totalprice);

        techjoomla.jQuery('#ticket_total_price_inputbox'+totalpriceid).val(totalprice);

        techjoomla.jQuery('input[class=\"totalpriceclass\"]').each(function()
        {
            total_calc_amt=parseFloat(total_calc_amt)+parseFloat(techjoomla.jQuery(this).val())
        });

        var couponenable=0;
        if(parseInt(total_calc_amt)==0)
        {
            techjoomla.jQuery('#cooupon_troption').hide();
        }
        else
        {
            couponenable=1;
            techjoomla.jQuery('#cooupon_troption').show();
        }

        if(techjoomla.jQuery('#coupon_chk').is(':checked') && techjoomla.jQuery('#coupon_code').val()!='')
        {

            applycoupon();

        }

        if(isNaN(total_calc_amt))
        {
            total_calc_amt=0;
        }

        total_calc_amt = total_calc_amt.toFixed(2);
        techjoomla.jQuery('#total_amt').html(total_calc_amt);
        techjoomla.jQuery('#total_amt_inputbox').val(total_calc_amt);
        techjoomla.jQuery('#net_amt_pay').html(total_calc_amt);
        techjoomla.jQuery('#net_amt_pay_inputbox').val(total_calc_amt);
        var allow_taxation=techjoomla.jQuery('#allow_taxation').val();

        if(allow_taxation==1)
        {
            calculatetax(total_calc_amt);
        }
    }
    ";


if (($totcount <= 0 and isset($this->eventtickets[0]->ticket) and $this->eventtickets[0]->ticket != 0 and $totavailable > 0)) { ?>
    <div class="alert alert-info col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <?php echo JText::_('ALL_TICKETS_SOLD');

        return;
        ?>
    </div>
    <?php
}

if (isset($this->orderdata['order_info']['0'])) {
    $orderdata = $this->orderdata['order_info']['0'];
}

?>
<form action="" method="post" name="ticketform" id="ticketform" class="">
    <h3><?php echo JText::sprintf('COM_ALLEVENTS_STEP_SELECT_TICKETS', $this->alleventdata->title); ?></h3>
    <hr/>
    <div id="event-info">
        <div>
            <h4><?php echo JText::_('COM_ALLEVENTS_EVENT_INFO'); ?></h4>
        </div>
        <div class="allevents-checkout-content checkout-first-step" id="event-info-tab">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id='no-more-tables'>
                        <table class="table table-striped table-bordered table-hover" width="98%" id="" cellspacing="0"
                               cellpadding="5">
                            <thead>
                            <tr>
                                <th><?php echo JText::_('EVENT_TITLE'); ?></th>
                                <th><?php echo JText::_('EVENTDATE'); ?></th>
                                <th><?php echo JText::_('AVAIL_TICKETS'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td data-title="<?php echo JText::_('EVENT_TITLE'); ?>">
                                    <span
                                        style="margin-left:2%;"><?php echo ucfirst($this->alleventdata->title); ?></span>
                                </td>

                                <td data-title="<?php echo JText::_('EVENTDATE'); ?>">
                                    <span style="margin-left:2%;"><?php echo $datetoshow; ?></span>
                                </td>
                                <td data-title="<?php echo JText::_('AVAIL_TICKETS'); ?>">
                                <span style="margin-left:2%;">
                                <?php
                                if ($totcount <= 0) {
                                    echo JText::_('UNLIM_SEATS');
                                } else {
                                    echo $totcount;
                                } ?>
                                </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4><?php echo JText::_('COM_ALLEVENTS_TICKET_INFO'); ?></h4>
                    <div id='no-more-tables'>
                        <table class="table table-striped table-bordered table-hover" id="ticket_info_tab_table">
                            <thead>
                            <tr>
                                <th><?php echo JText::_('TICKET_TYPE_TITLE'); ?></th>
                                <?php
                                if ($show_ticket_description) {
                                    ?>
                                    <th><?php echo JText::_('JT_TICKET_TYPE_DESC'); ?></th>
                                    <?php
                                }
                                ?>
                                <th><?php echo JText::_('TICKET_TYPE_PRICE'); ?></th>
                                <th><?php echo JText::_('TICKET_TYPE_AVAILABLE'); ?></th>
                                <th><?php echo JText::_('TICKET_TYPE_NO'); ?></th>
                                <th><?php echo JText::_('TICKET_TYPE_TOTAL_PRICE'); ?></th>
                            </tr>
                            </thead>
                            <?php
                            $totaltype_price = 0;

                            foreach ($this->eventtypedata as $type) {

                                if (((isset($type->count) and $type->count > 0 and $type->unlimited_seats == 0) or $type->unlimited_seats == 1) and !($type->hide_ticket_type)) {
                                    if ($type->title) {
                                        ?>
                                        <tr>
                                            <td data-title="<?php echo JText::_('TICKET_TYPE_TITLE'); ?>"><input
                                                    class="inputbox input-mini" id="type_id[]" name="type_id[]"
                                                    type="hidden"
                                                    value="<?php echo $type->id ?>"><?php echo $type->title; ?> </td>
                                            <?php
                                            if ($show_ticket_description) {
                                                ?>
                                                <td data-title="<?php echo JText::_('JT_TICKET_TYPE_DESC'); ?>"><?php echo $type->desc; ?> </td>
                                                <?php
                                            } ?>
                                            <td data-title="<?php echo JText::_('TICKET_TYPE_PRICE'); ?>">
                                                <?php
                                                if ($type->price == 0) {
                                                    echo JText::_('FREE_TICKET');
                                                } else {
                                                    if ($currency_display_format == '{CURRENCY_SYMBOL}{AMOUNT}')
                                                        echo $this->currency_symbol . ' ' . $type->price;
                                                    else
                                                        echo $type->price . ' ' . $this->currency_symbol;
                                                }

                                                if (isset($this->orderdata['ticket_type_count'][$type->id])) {
                                                    $typecnt = $this->orderdata['ticket_type_count'][$type->id];
                                                    $type_price = $type->price * $typecnt;
                                                    $totaltype_price = $totaltype_price + $type_price;
                                                } else {
                                                    $typecnt = 0;
                                                    $type_price = 0;
                                                }

                                                ?>
                                            </td>
                                            <td data-title="<?php echo JText::_('TICKET_TYPE_AVAILABLE'); ?>"><?php
                                                $unlimited = 0;
                                                if ($type->unlimited_seats == 1) {
                                                    $unlimited = 1;
                                                    echo JText::_('UNLIM_SEATS');
                                                } else echo $type->count; ?> </td>
                                            <td data-title="<?php echo JText::_('TICKET_TYPE_NO'); ?>"><input
                                                    id="type_ticketcount[<?php echo $type->id ?>]"
                                                    name="type_ticketcount[<?php echo $type->id ?>]"
                                                    class="input-small type_ticketcounts" Onkeyup="checkforalpha(this)"
                                                    onblur="caltotal('<?php echo $type->count; ?>','<?php echo $type->id; ?>',<?php echo $type->price ?>,this,<?php echo $unlimited; ?>,<?php if ($this->max_noticket_peruserperpurchase) echo $this->max_noticket_peruserperpurchase;
                                                    else echo "10" ?>)"
                                                    type="text" value="<?php echo $typecnt; ?>"></td>
                                            <td data-title="<?php echo JText::_('TICKET_TYPE_TOTAL_PRICE'); ?>">
                                                <?php
                                                if ($currency_display_format == '{CURRENCY_SYMBOL}{AMOUNT}')
                                                    echo $this->currency_symbol;
                                                ?>
                                                <span
                                                    id="ticket_total_price<?php echo $type->id; ?>"><?php echo $type_price; ?></span>
                                                <?php
                                                if ($currency_display_format != '{CURRENCY_SYMBOL}{AMOUNT}')
                                                    echo $this->currency_symbol;
                                                ?>
                                                <input class="totalpriceclass"
                                                       id="ticket_total_price_inputbox<?php echo $type->id; ?>"
                                                       name="ticket_total_price_inputbox<?php echo $type->id; ?>"
                                                       type="hidden" value="<?php echo $type_price; ?>">
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <tr>
                                <td></td>
                                <td colspan="<?php echo $colspan; ?>" style="text-align:right;">
                                    <b><?php echo JText::_('TOTALPRICE'); ?></b>
                                </td>
                                <td>
                                    <?php
                                    if ($currency_display_format == '{CURRENCY_SYMBOL}{AMOUNT}')
                                        echo $this->currency_symbol;
                                    ?>
                                    <span id="total_amt"><?php echo $totaltype_price; ?></span> <?php
                                    if ($currency_display_format != '{CURRENCY_SYMBOL}{AMOUNT}')
                                        echo $this->currency_symbol; ?>
                                    <input type="hidden" value="<?php echo $totaltype_price; ?>"
                                           name="total_amt_inputbox"
                                           id="total_amt_inputbox">
                                </td>
                            </tr>
                            <?php
                            if ($this->allevents_params->get('enable_coupon')) {
                                if (!empty($orderdata->coupon_code)) {
                                    $coupon_display = "display:display";
                                    $coupon_checkbox_style = "checked=checked";
                                    $coupon_code = $orderdata->coupon_code;
                                } else {
                                    $coupon_display = 'display:none';
                                    $coupon_checkbox_style = "";
                                    $coupon_code = '';
                                }

                                ?>
                                <tr style="<?php echo $coupon_display; ?>" id="cooupon_troption">
                                    <td></td>
                                    <td colspan="<?php echo $colspan; ?>">
                                        <div class="">
                              <span
                                  class=""><input <?php if (isset($coupon_checkbox_style)) echo $coupon_checkbox_style; ?>
                                      type="checkbox" aria-invalid="false" class="" id="coupon_chk" name="coupon_chk"
                                      value="" size="10" onchange="show_cop()">
                                  <?php echo JText::_('HAVE_COP'); ?>
                              </span>
                                            <input id="coupon_code" style="<?php echo $coupon_display; ?> "
                                                   class="input-small focused"
                                                   placeholder="<?php echo JText::_('CUPCODE'); ?>" name="coupon_code"
                                                   value="<?php if (isset($orderdata->coupon_code)) echo $orderdata->coupon_code; ?>">
                                            <input type="button" style="<?php echo $coupon_display; ?>"
                                                   name="coup_button" id="coup_button"
                                                   class="btn  btn-default  btn-success btn-medium"
                                                   onclick="applycoupon()" value="<?php echo JText::_('APPLY'); ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr id="dis_cop" style="<?php echo $coupon_display; ?>">
                                    <td></td>
                                    <td colspan="<?php echo $colspan; ?>"><b><?php echo JText::_('COP_DISCOUNT'); ?></b>
                                    </td>
                                    <td>
                                        <?php
                                        if ($currency_display_format == '{CURRENCY_SYMBOL}{AMOUNT}')
                                            echo $this->currency_symbol;
                                        ?>
                                        <span id="dis_cop_amt">
                           <?php
                           if (!empty($orderdata->coupon_discount)) {
                               echo $orderdata->coupon_discount;
                           } else {
                               //$orderdata->coupon_discount=0;
                           }
                           ?>
                           </span>&nbsp;<?php
                                        if ($currency_display_format != '{CURRENCY_SYMBOL}{AMOUNT}')
                                            echo $this->currency_symbol;
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr id="dis_amt">
                                <td></td>
                                <td colspan="<?php echo $colspan; ?>" style="text-align:right;">
                                    <b><?php echo JText::_('TOTALPRICE_PAY'); ?></b>
                                </td>
                                <td>
                                    <?php
                                    if ($totaltype_price) {
                                        $net_amt_pay = (float)$totaltype_price - (float)$orderdata->coupon_discount;
                                    } else {
                                        $net_amt_pay = 0;
                                    }

                                    ?>
                                    <?php
                                    if ($currency_display_format == '{CURRENCY_SYMBOL}{AMOUNT}')
                                        echo $this->currency_symbol;
                                    ?>
                                    <span id="net_amt_pay"><?php echo $net_amt_pay ?></span>
                                    <?php
                                    if ($currency_display_format != '{CURRENCY_SYMBOL}{AMOUNT}')
                                        echo $this->currency_symbol;
                                    ?>
                                    <input type="hidden" class="inputbox" value="<?php echo $net_amt_pay; ?>"
                                           name="net_amt_pay_inputbox" id="net_amt_pay_inputbox">
                                </td>
                            </tr>
                            <?php
                            if ($this->allow_taxation and isset($this->tax_per) and $this->tax_per > 0) {
                                ?>
                                <tr class="tax_tr">
                                    <td></td>
                                    <td colspan="<?php echo $colspan; ?>" style="text-align:right;">
                                        <b><?php echo JText::sprintf('TAX_AMOOUNT', $this->tax_per) . "%"; ?></b>
                                    </td>
                                    <td>
                                        <?php
                                        if ($currency_display_format == '{CURRENCY_SYMBOL}{AMOUNT}')
                                            echo $this->currency_symbol;
                                        ?>
                                        <span id="tax_to_pay">
                           <?php
                           if (isset($orderdata->order_tax)) {
                               echo $orderdata->order_tax;
                           } else {
                               //$orderdata->order_tax=0;
                           }

                           if (isset($orderdata->amount)) {
                               $final_amount = $orderdata->amount;
                           } else {
                               $final_amount = 0;
                           }
                           ?>
                           </span><?php
                                        if ($currency_display_format != '{CURRENCY_SYMBOL}{AMOUNT}')
                                            echo $this->currency_symbol;
                                        ?>
                                        <input type="hidden" class="inputbox"
                                               value="<?php if (isset($orderdata->order_tax)) {
                                                   echo $orderdata->order_tax;
                                               } ?>" name="tax_to_pay_inputbox" id="tax_to_pay_inputbox">
                                    </td>
                                </tr>
                                <tr class="tax_tr">
                                    <td></td>
                                    <td colspan="<?php echo $colspan; ?>" style="text-align:right;">
                                        <b><?php echo JText::_('TOTALPRICE_PAY_AFTER_TAX'); ?></b>
                                    </td>
                                    <td>
                                        <?php
                                        if ($currency_display_format == '{CURRENCY_SYMBOL}{AMOUNT}')
                                            echo $this->currency_symbol;
                                        ?>
                                        <span id="net_amt_after_tax">
                           <?php echo $final_amount; ?></span>
                                        <?php
                                        if ($currency_display_format != '{CURRENCY_SYMBOL}{AMOUNT}')
                                            echo $this->currency_symbol;
                                        ?>
                                        <input type="hidden" class="inputbox" value="<?php echo $final_amount; ?>"
                                               name="net_amt_after_tax_inputbox" id="net_amt_after_tax_inputbox"/>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="allow_taxation" id="allow_taxation"
           value="<?php if ($this->allow_taxation and isset($this->tax_per) and $this->tax_per > 0) echo $this->allow_taxation;
           else echo 0; ?>"/>
    <input type="hidden" name="order_tax" id="order_tax" value="0"/>
    <input type="hidden" name="eventid" value="<?php echo $this->eventid; ?>"/>
    <input type="hidden" name="collect_attendee_information" id="collect_attendee_information"
           value="<?php if (!empty($this->collect_attendee_info_checkout)) echo $this->collect_attendee_info_checkout;
           else echo 0; ?>"/>
    <input type="hidden" name="event_integraton_id" value="<?php echo $this->event_integraton_id; ?>"/>
    <input type="hidden" name="order_id" value=""/>
</form>
<?php
$document->addScriptDeclaration($js);
?>
