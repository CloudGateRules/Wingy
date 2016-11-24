<?php

# 关闭所有 Notice | Warning 级别的错误
error_reporting(E_ALL^E_NOTICE^E_WARNING);

# 页面禁止缓存 | UTF-8编码 | 触发下载
header("cache-control:no-cache,must-revalidate");
header("Content-Type:text/html;charset=UTF-8");
header('Content-Disposition: attachment; filename='.'Wingy.Conf');

# 设置开启哪些模块 | 必须放置在最前面
$DefaultModule  = "true";
$AdvancedModule = "true";
$REJECTModule   = "true";
$DIRECTModule   = "true";

# 引用Controller控制器模块
require '../Controller/Controller.php';

# Wingy[General]规则模板
echo "version: 2\r\n";
echo "#  \r\n";
echo "# Wingy Config File [CloudGate]\r\n";
echo "# Download Time: " . date("Y-m-d H:i:s") . "\r\n";
echo "# \r\n";
echo "adapter:\r\n";
echo "  - id: proxy\r\n";
echo "    type: ss\r\n";
echo "    method: AES-256-CFB\r\n";
echo "    host: 127.0.0.1\r\n";
echo "    port: 80\r\n";
echo "    password: Password\r\n";
echo "  - id: speed\r\n";
echo "    type: SPEED\r\n";
echo "    adapters:\r\n";
echo "      - id: direct\r\n";
echo "        delay: 0\r\n";
echo "      - id: proxy\r\n";
echo "        delay: 500\r\n";
echo " - id: reject\r\n";
echo "   type: reject\r\n";
echo "   delay: 300\r\n";
echo "rule:\r\n";
echo "  - type: domainlist\r\n";
echo "    adapter: direct\r\n";
echo "    criteria:\r\n";
echo "# Default\r\n".$Wingy_Default;
echo "  - type: domainlist\r\n";
echo "    adapter: proxy\r\n";
echo "    criteria:\r\n";
echo "# PROXY\r\n".$Wingy_Advanced;
echo "  - type: domainlist\r\n";
echo "    adapter: reject\r\n";
echo "    criteria:\r\n";
echo "# REJECT\r\n".$Wingy_REJECT;
echo "  - type: domainlist\r\n";
echo "    adapter: direct\r\n";
echo "    criteria:\r\n";
echo "# DIRECT\r\n".$Wingy_DIRECT;
echo "  - type: iplist\r\n";
echo "    adapter: direct\r\n";
echo "    criteria:\r\n";
echo "# IP-CIDR";
echo "      - 10.0.0.0/8\r\n";
echo "      - 127.0.0.0/8\r\n";
echo "      - 192.168.0.0/16\r\n";
echo "# Other\r\n";
echo "  - type: DNSFail\r\n";
echo "    adapter: proxy\r\n";
echo "  - type: country\r\n";
echo "    country: CN\r\n";
echo "    match: true\r\n";
echo "    adapter: direct\r\n";
echo "  - type: country\r\n";
echo "    country: --\r\n";
echo "    match: true\r\n";
echo "    adapter: speed\r\n";
echo "  - type: all\r\n";
echo "    adapter: proxy\r\n";

?>