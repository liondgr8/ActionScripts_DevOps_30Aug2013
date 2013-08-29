Add-PSSnapin -Name "VMWare.VimAutomation.Core"

$server_name = $args[0]
$username = $args[1]
$password = $args[2]




$vc = Connect-VIServer -Server $server_name -Protocol https -Username $username -Password $password

Get-VirtualSwitch

Disconnect-VIServer -Server $vc -Confirm:$false

