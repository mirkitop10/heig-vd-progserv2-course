<?php

namespace Tools;

interface ToolsManagerInterface {
    public function getTools(): array;
    public function addTool(Tool $tools): int;
    public function removeTool(int $id): bool;
}
