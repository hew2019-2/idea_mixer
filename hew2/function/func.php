<?php
    // サニタイズ
    function h($value) {
        return htmlspecialchars($value);
    }