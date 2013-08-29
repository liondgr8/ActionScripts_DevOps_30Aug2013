Add-PSSnapin -Name "VMWare.VimAutomation.Core"

$server_name = $args[0]
$username = $args[1]
$password = $args[2]
$hostName = $args[3]


$vc = Connect-VIServer -Server $server_name -Protocol https -Username $username -Password $password

Get-VMHost $hostName | Get-VApp | Remove-VApp -Confrim:$false

Disconnect-VIServer -Server $vc -Confirm:$false
