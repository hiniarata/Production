
<!-- form -->
<?php echo $this->BcForm->create('ProductionConfig') ?>
<div class="section">
    <table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
        <tr>
            <th class="col-head"><?php echo $this->BcForm->label('ProductionConfig.name', '制作会社名') ?>&nbsp;<span class="required">*</span></th>
            <td class="col-input">
                <?php echo $this->BcForm->input('ProductionConfig.name', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
                <?php echo $this->BcForm->error('ProductionConfig.name') ?>
                <?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
                <div id="helptextName" class="helptext">
                    <ul>
                        <li>制作会社名を設定します。</li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr>
            <th class="col-head"><?php echo $this->BcForm->label('ProductionConfig.email', '送信先アドレス') ?>&nbsp;<span class="required">*</span></th>
            <td class="col-input">
                <?php echo $this->BcForm->input('ProductionConfig.email', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
                <?php echo $this->BcForm->error('ProductionConfig.email') ?>
                <?php echo $this->BcHtml->image('admin/icn_help.png', array('id' => 'helpName', 'class' => 'btn help', 'alt' => 'ヘルプ')) ?>
                <div id="helptextName" class="helptext">
                    <ul>
                        <li>送信先のemailアドレスを設定します。</li>
                    </ul>
                </div>
            </td>
        </tr>
    </table>
</div>
<!-- button -->
<div class="submit">
    <?php echo $this->BcForm->submit('保存', array('div' => false, 'class' => 'button', 'id' => 'BtnSave')) ?>
</div>

<?php echo $this->BcForm->end() ?>
