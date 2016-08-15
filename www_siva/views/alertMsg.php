<?php header('Access-Control-Allow-Origin: *'); ?>
<div class="modal-body" style="padding:0px">
    <div class="alert alert-{{alertMsg.msgType}}" style="margin-bottom:0px">
        <button type="button" class="close" data-ng-click="close()">
            <span class="glyphicon glyphicon-remove-circle"></span>
        </button>
        <strong class="fontLobster"><i ng-if="alertMsg.msgType === 'success'" class="fa fa-check"></i>{{alertMsg.msgText}}</strong>
    </div>
</div>
