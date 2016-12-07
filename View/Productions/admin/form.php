<?php if(empty($productionConfigs)): ?>

<p>
    設定情報を確認できません。
    お問い合わせの
    <?php $this->BcBaser->link('設定', array('plugin'=>'production', 'controller' => 'production_configs', 'action' => 'admin_index')) ?>
    を行ってください。
</p>

<?php else: ?>

<!-- form -->
<?php echo $this->BcForm->create('Production') ?>
<div class="section">
    <table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
        <tr>
            <th class="col-head">宛先</th>
            <td class="col-input">
                <?php echo $productionConfigs['ProductionConfig']['name']; ?>
                <?php echo $this->BcForm->input('Production.name', array('type' => 'hidden', 'value' => $productionConfigs['ProductionConfig']['name'])) ?>
            </td>
        </tr>
        <tr>
            <th class="col-head">WEBサイト</th>
            <td class="col-input">
                <?php $uri = $this->BcBaser->getUri('/'); ?>
                <?php echo $uri ?>
                <?php echo $this->BcForm->input('Production.uri', array('type' => 'hidden', 'value' => $uri)) ?>
            </td>
        </tr>
        <tr>
            <th class="col-head"><?php echo $this->BcForm->label('Production.text', 'お問い合わせ内容') ?>&nbsp;<span class="required">*</span></th>
            <td class="col-input">
                <?php echo $this->BcForm->input('Production.text', array('type' => 'textarea')) ?>
                <?php echo $this->BcForm->error('Production.text') ?>
                <?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
                <div id="helptextName" class="helptext">
                    <ul>
                        <li>お問い合わせの内容をご入力ください。</li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>
</div>
<!-- button -->
<div class="submit">
    <?php echo $this->BcForm->submit('送信する', array('div' => false, 'class' => 'button', 'id' => 'BtnSave')) ?>
</div>

<?php echo $this->BcForm->end() ?>

<?php endif ?>