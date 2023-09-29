<?php

namespace T3easy\PrivacyRenderers\Resource\Rendering;

use TYPO3\CMS\Core\Resource\FileInterface;

class YouTubeRenderer extends \TYPO3\CMS\Core\Resource\Rendering\YouTubeRenderer
{
    /**
     * Returns the priority of the renderer
     * This way it is possible to define/overrule a renderer
     * for a specific file type/context.
     * For example create a video renderer for a certain storage/driver type.
     * Should be between 1 and 100, 100 is more important than 1
     *
     * @return int
     */
    public function getPriority()
    {
        return 2;
    }

    /**
     * Render for given File(Reference) html output
     *
     * @param int|string $width TYPO3 known format; examples: 220, 200m or 200c
     * @param int|string $height TYPO3 known format; examples: 220, 200m or 200c
     * @return string
     */
    public function render(FileInterface $file, $width, $height, array $options = [])
    {
        $options = $this->collectOptions($options, $file);
        $src = $this->createYouTubeUrl($options, $file);
        $attributes = $this->collectIframeAttributes($width, $height, $options);

        return sprintf(
            '<iframe data-name="youtube" data-src="%s"%s></iframe>',
            htmlspecialchars($src, ENT_QUOTES | ENT_HTML5),
            empty($attributes) ? '' : ' ' . $this->implodeAttributes($attributes)
        );
    }
}