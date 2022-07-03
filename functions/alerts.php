<?php

function set_alert(string $type, string $text): void
{
    $_SESSION['alerts'][] = [
        'type' => $type,
        'text' => $text
    ];
}

function get_alerts(): array
{
    return $_SESSION['alerts'] ?? [];
}

function flush_alerts(): void
{
    $_SESSION['alerts'] = [];
}
