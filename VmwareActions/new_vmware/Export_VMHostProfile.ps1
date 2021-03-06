Add-PSSnapin -Name "VMWare.VimAutomation.Core"

$server_name = $args[0]
$username = $args[1]
$password = $args[2]
$FilePath = $args[3]
$ProfileName = $args[4]


$vc = Connect-VIServer -Server $server_name -Protocol https -Username $username -Password $password

Export-VMHostProfile -FilePath $FilePath -Profile $ProfileName -Force 

Disconnect-VIServer -Server $vc -Confirm:$false

