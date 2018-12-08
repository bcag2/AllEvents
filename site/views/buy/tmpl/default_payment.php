<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

$document = JFactory::getDocument();
// getting payment list START
$com_params = JComponentHelper::getParams('com_allevents');
$order_id = $session->get('JT_orderid');
$selected_gateways = $com_params->get('gateways');
//getting GETWAYS
$dispatcher = JEventDispatcher::getInstance();
JPluginHelper::importPlugin('payment');

if (!is_array($selected_gateways)) {
    $gateway_param[] = $selected_gateways;
} else {
    $gateway_param = $selected_gateways;
}
$gateways = "";
if (!empty($gateway_param)) {
    $gateways = $dispatcher->trigger('onTP_GetInfo', [$gateway_param]);
}
$this->gateways = $gateways;
?>
<script type="text/javascript">
    function gatewayHtml(ele, orderid) {

        var prev_button_html = '<button id="btnWizardPrev1" onclick="techjoomla.jQuery(\'#MyWizard\').wizard(\'previous\');"    type="button" class="btn  btn-default  btn-prev pull-left" > <i class="icon-arrow-left" ></i>Prev</button>';

        techjoomla.jQuery.ajax({
            beforeSend: function () {
                techjoomla.jQuery('#allevents-payHtmlDiv').before('<div class=\"com_allevents_ajax_loading\"><div class=\"com_allevents_ajax_loading_text\">' + loadingMsg + ' ...</div><img class=\"com_socialad_ajax_loading_img\" src="' + root_url + 'components/com_allevents/assets/images/loading_data.gif"></div>');

            },
            complete: function () {
                techjoomla.jQuery('.com_allevents_ajax_loading').remove();

            },
            url: root_url + '?option=com_allevents&task=payment.changegateway&gateways=' + ele + '&order_id=' + orderid + '&tmpl=component',
            type: 'POST',
            data: '',
            dataType: 'text',
            success: function (data) {
                if (data) {
                    techjoomla.jQuery('#allevents-payHtmlDiv').html(data);
                    techjoomla.jQuery('#allevents-payHtmlDiv div.form-actions').prepend(prev_button_html);
                    techjoomla.jQuery('#allevents-payHtmlDiv div.form-actions input[type="submit"]').addClass('pull-right');

                }

            }
        });
    }
</script>
<div class="allevents-checkout-content col-lg-12 col-md-12 col-sm-12 col-xs-12" id="payment-info-tab">
    <div id="payment-info" class="allevents-checkout-steps form-horizontal">
        <!-- show payment option start -->
        <div class="">
            <div class="paymentHTMLWrapper ">
                <hr class="hr hr-condensed"/>
                <div class="">
                    <?php
                    $default = "";
                    $lable = JText::_('COM_ALLEVENTS_SEL_GATEWAY');
                    $gateway_div_style = 1;
                    if (!empty($this->gateways)) //if only one geteway then keep it as selected
                    {
                        $default = $this->gateways[0]->id; // id and value is same
                    }
                    if (!empty($this->gateways) && count($this->gateways) == 1) //if only one geteway then keep it as selected
                    {
                        $default = $this->gateways[0]->id; // id and value is same
                        $lable = JText::_('COM_ALLEVENTS_SEL_GATEWAY');
                        $gateway_div_style = 1;
                    }
                    ?>
                    <h4><?php echo $lable ?> </h4>
                    <div class="container-fluid" style="<?php echo ($gateway_div_style == 1) ? "" : "display:none;" ?>">
                        <?php
                        if (empty($this->gateways))
                            echo JText::_('COM_ALLEVENTS_NO_PAYMENT_GATEWAY');
                        else {
                            $ad_fun = "onChange=gatewayHtml(this.value,$order_id)";
                            $pg_list = JHtml::_('select.radiolist', $this->gateways, 'gateways', 'class="radio gatewaylabel required" ' . $ad_fun . '  ', 'id', 'name', '', false);
                            echo $pg_list;
                        }
                        ?>
                    </div>
                    <?php
                    if (empty($gateway_div_style)) {
                        ?>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 qtc_left_top">
                            <?php echo $this->gateways[0]->name; // id and value is same 
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <hr class="hr hr-condensed"/>
                    <div id="allevents-payHtmlDiv">
                    </div>
                    <!-- show payment hmtl form-->
                </div>
                <!-- end of paymentHTMLWrapper-->
            </div>
            <!-- show payment option end -->
        </div>
    </div>
</div>
