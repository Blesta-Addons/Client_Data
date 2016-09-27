# Client_Data
Blesta Plugin That Allow Dev/Themers Get Client Data Info As Json Response , then they can use it in their Template or Plugin . 

This Plugin didn't need install, just upload the folder client_data to plugins and you are ready to go . 

Not all request should be Done Via Ajax , a direct call will return a blank page . 

Example of Requests : 

1 - For Tickets, the last element is the Tickets status 

Get CLient's Open Tickets
http://your_domain.com/blesta_dir/plugin/client_data/main/count_tickets/open

Get CLient's Closed Tickets
http://your_domain.com/blesta_dir/plugin/client_data/main/count_tickets/closed

2 - For Services, the last element is the Service status 

Get CLient's Active Services
http://your_domain.com/blesta_dir/plugin/client_data/main/count_services/active

Get CLient's Suspended Services
http://your_domain.com/blesta_dir/plugin/client_data/main/count_services/suspended

3 - For Invoices, the last element is the Invoices status 

Get CLient's Open Invoices
http://your_domain.com/blesta_dir/plugin/client_data/main/count_services/open

Get CLient's Vioded Invoices
http://your_domain.com/blesta_dir/plugin/client_data/main/count_services/vioded

To get the info by Ajax request in template us this code 

		<?php
		$this->Javascript->setInline('
			$(document).ready(function() {
				fetchInvoices();
			});
			
			function fetchInvoicesCount() {
				$(this).blestaRequest("GET", "' . $this->Html->safe($this->base_uri . "plugin/client_data/main/count_invoices/open") . '", null, function(data) {
					if (data)
						$("#my_div_id_to_replace").html(data);
				},
				null,
				{dataType:"json"});
			}
		');
		?>
    
To explain the code , you need to change the url and the div to put the requested data . 

