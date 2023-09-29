<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Resource\Rendering\RendererRegistry;
use T3easy\PrivacyRenderers\Resource\Rendering\VimeoRenderer;
use T3easy\PrivacyRenderers\Resource\Rendering\YouTubeRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') or die();

$rendererRegistry = GeneralUtility::makeInstance(RendererRegistry::class);
$rendererRegistry->registerRendererClass(VimeoRenderer::class);
$rendererRegistry->registerRendererClass(YouTubeRenderer::class);
unset($rendererRegistry);
