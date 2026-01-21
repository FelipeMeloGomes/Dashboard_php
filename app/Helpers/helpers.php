<?php

/**
 * Retorna uma saudação baseada no horário atual.
 */
function greeting(): string
{
  $hour = now()->hour;

  return match (true) {
    $hour >= 5 && $hour < 12 => 'Bom dia',
    $hour >= 12 && $hour < 18 => 'Boa tarde',
    default => 'Boa noite',
  };
}
