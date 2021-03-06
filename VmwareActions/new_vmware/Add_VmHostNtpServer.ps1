Add-PSSnapin -Name "VMWare.VimAutomation.Core"

$server_name = $args[0]
$username = $args[1]
$password = $args[2]
$VMHost = $args[3]
$NtpServer = $args[4]



$vc = Connect-VIServer -Server $server_name -Protocol https -Username $username -Password $password

Add-VmHostNtpServer -NtpServer $NtpServer -VMHost $VMHost -Confirm:$false

Disconnect-VIServer -Server $vc -Confirm:$false