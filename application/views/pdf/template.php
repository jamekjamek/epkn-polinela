<?php if ($header->header && $header->logo) : ?>
    <!-- <htmlpageheader> -->
    <table style="width: 100%; height: 59px;" border="0">
        <tbody>
            <tr>
                <td style="width: 23%;"><img src="<?= base_url('assets/img/logo/' . $header->logo) ?>" alt="" width="100" height="100" /></td>
                <td style="text-align: center;">
                    <?= $header->header; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <hr style="height: 2px;background-color:black" />

    <!-- </htmlpageheader> -->
<?php endif; ?>


<!-- <?php if ($footer === true) : ?>
    
<?php endif; ?> -->