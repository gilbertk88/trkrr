<?php

class TrkrrLoader extends MvcPluginLoader {

    var $db_version = '1.0';
    var $tables = array();

    function activate() {
    
        // This call needs to be made to activate this app within WP MVC
        
        $this->activate_app(__FILE__);
        
        // Perform any databases modifications related to plugin activation here, if necessary

        require_once ABSPATH.'wp-admin/includes/upgrade.php';
    
        add_option('Trkrrdb_version', $this->db_version);
        
        // Use dbDelta() to create the tables for the app here
	$sql =[ "
            
		CREATE TABLE IF NOT EXISTS `wp_trkrr_abtest` (
		  `id` int(11) NOT NULL,
		  `name` varchar(50) NOT NULL,
		  `type` int(2) NOT NULL,
		  `notes` varchar(250) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		--
		-- Table structure for table `wp_trkrr_abtest_record`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_abtest_record` (
		  `id` int(11) NOT NULL,
		  `test_id` int(11) NOT NULL,
		  `subject_id` int(11) NOT NULL,
		  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		--
		-- Dumping data for table `wp_trkrr_abtest_record`
		--

		--
		-- Table structure for table `wp_trkrr_abtest_type`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_abtest_type` (
		  `id` int(2) NOT NULL,
		  `name` varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		--
		-- Dumping data for table `wp_trkrr_abtest_type`
		--
                
        INSERT INTO wp_trkrr_abtest_type (`id`, `name`) 
		 SELECT 1, 'Link' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_abtest_type WHERE id=1); ","
		 
		INSERT INTO wp_trkrr_abtest_type (`id`, `name`) 
		 SELECT 2, 'Campaign' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_abtest_type WHERE id=2); ","
                
		-- --------------------------------------------------------

		--
		-- Table structure for table `wp_trkrr_facebook`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_facebook` (
		  `id` int(11) NOT NULL,
		  `title` varchar(50) NOT NULL,
		  `description` int(250) NOT NULL,
		  `image` varchar(250) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		-- --------------------------------------------------------

		--
		-- Table structure for table `wp_trkrr_group`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_group` (
		  `id` int(11) NOT NULL,
		  `name` varchar(100) NOT NULL,
		  `group_type` int(11) NOT NULL COMMENT '1=> group 2=> subgroup 3 => rotator group',
		  `group_parent` int(11) NOT NULL,
		  `active` int(3) NOT NULL DEFAULT '1'
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","
		
		--
		-- Table structure for table `wp_trkrr_groups`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_groups` (
		  `id` int(11) NOT NULL,
		  `group_name` varchar(100) NOT NULL,
		  `group_type` int(3) NOT NULL COMMENT '1=> group 2=> subgroup 3 => rotator group',
		  `group_parent` int(11) NOT NULL DEFAULT '0'
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		--
		-- Table structure for table `wp_trkrr_group_type`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_group_type` (
		  `id` int(11) NOT NULL,
		  `name` varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		--
		-- Dumping data for table `wp_trkrr_group_type`
		--
        INSERT INTO wp_trkrr_group_type (`id`, `name`) 
		 SELECT 1, 'Main Campaign' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_group_type WHERE id=1); ","
		 
		INSERT INTO wp_trkrr_group_type (`id`, `name`) 
		 SELECT 2, 'Sub-Campaign' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_group_type WHERE id=2); ","
		 
		INSERT INTO wp_trkrr_group_type (`id`, `name`) 
		 SELECT 3, 'Rotator Campaign' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_group_type WHERE id=3); ","
		 

		-- --------------------------------------------------------

		--
		-- Table structure for table `wp_trkrr_links`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_links` (
		  `id` int(11) NOT NULL,
		  `name` varchar(250) NOT NULL,
		  `link_tracker` varchar(250) NOT NULL COMMENT 'The link that will track',
		  `primary_url` varchar(550) NOT NULL COMMENT 'where the page redirect to',
		  `conversion_type` int(2) NOT NULL,
		  `conversion_revenue` int(11) NOT NULL,
		  `record_conversion` varchar(250) DEFAULT NULL,
		  `cloak_link` int(1) NOT NULL DEFAULT '0',
		  `facebook_title` varchar(100) NOT NULL,
		  `facebook_description` varchar(250) NOT NULL,
		  `facebook_image` varchar(250) NOT NULL,
		  `front_end` tinyint(1) NOT NULL DEFAULT '0',
		  `notes` varchar(250) NOT NULL,
		  `cost` float NOT NULL DEFAULT '0',
		  `type_of_cost` int(3) NOT NULL DEFAULT '1' COMMENT '1=> cpc, 2=> cpa, 3=> daily, 4=>monthly',
		  `category_id` int(11) NOT NULL,
		  `destination_type` int(3) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		--
		-- Table structure for table `wp_trkrr_link_stat`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_link_stat` (
		  `id` int(11) NOT NULL,
		  `data_type` varchar(11) NOT NULL,
		  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `link_id` int(11) NOT NULL,
		  `info` varchar(500) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","


		CREATE TABLE IF NOT EXISTS `wp_trkrr_rotator` (
		  `id` int(11) NOT NULL,
		  `parent_type` int(3) NOT NULL,
		  `parent_id` int(3) NOT NULL,
		  `link_id` int(11) NOT NULL,
		  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `notes` varchar(10) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		-- --------------------------------------------------------

		--
		-- Table structure for table `wp_trkrr_typeofconversion`
		--

		CREATE TABLE IF NOT EXISTS `wp_trkrr_typeofconversion` (
		  `id` int(11) NOT NULL,
		  `name` varchar(50) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","

		--
		-- Dumping data for table `wp_trkrr_typeofconversion`
		--

        INSERT INTO wp_trkrr_typeofconversion (`id`, `name`) 
		 SELECT 1, 'Action' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_typeofconversion WHERE id=1); ","
		 
		INSERT INTO wp_trkrr_typeofconversion (`id`, `name`) 
		 SELECT 2, 'Sale' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_typeofconversion WHERE id=2); ","

		
		CREATE TABLE IF NOT EXISTS `wp_trkrr_typeofcost` (
		  `id` int(11) NOT NULL,
		  `name` varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","
		
		INSERT INTO wp_trkrr_typeofcost (`id`, `name`) 
		 SELECT 1, 'Fixed' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_typeofcost WHERE id=1); ","
		
		INSERT INTO wp_trkrr_typeofcost (`id`, `name`) 
		 SELECT 2, 'Cost per Click' FROM DUAL
		 WHERE NOT EXISTS (SELECT id FROM wp_trkrr_typeofcost WHERE id=2); ","
		 

		CREATE TABLE IF NOT EXISTS `wp_trkrr_typeofdestination` (
		  `id` int(11) NOT NULL,
		  `name` varchar(50) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","
                
        INSERT INTO wp_trkrr_typeofdestination (`id`, `name`)
		 SELECT 1, 'Custom Link' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_typeofdestination WHERE id=1); ","
		 
		INSERT INTO wp_trkrr_typeofdestination (`id`, `name`) 
		 SELECT 2, 'Split Test' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_typeofdestination WHERE id=2); ","
		 
		INSERT INTO wp_trkrr_typeofdestination (`id`, `name`) 
		 SELECT 3, 'Rotator group' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_typeofdestination WHERE id=3); ","


		CREATE TABLE IF NOT EXISTS `wp_trkrr_typeoflink` (
		  `id` int(11) NOT NULL,
		  `name` varchar(50) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1; ","


        INSERT INTO wp_trkrr_typeoflink (`id`, `name`) 
		 SELECT 1, 'Organic(free)' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_typeoflink WHERE id=1); ","
		 
		INSERT INTO wp_trkrr_typeoflink (`id`, `name`) 
		 SELECT 2, 'Paid' FROM DUAL
		 WHERE NOT EXISTS  (SELECT id FROM wp_trkrr_typeoflink WHERE id=2); "]
	;
//dbDelta($sql);

global $wpdb;

foreach ($sql as $sql_string){
    $wpdb->query($sql_string);
}


$alter_array=array(
		"ALTER TABLE `wp_trkrr_abtest`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_abtest_record`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_abtest_type`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_facebook`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_group`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_groups`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_group_type`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_links`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_link_stat`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_rotator`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_typeofconversion`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_typeofcost`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_typeofdestination`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_typeoflink`
		  ADD PRIMARY KEY (`id`);","

		ALTER TABLE `wp_trkrr_abtest`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;","

		ALTER TABLE `wp_trkrr_abtest_record`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;","

		ALTER TABLE `wp_trkrr_abtest_type`
		  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;","

		ALTER TABLE `wp_trkrr_facebook`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;","

		ALTER TABLE `wp_trkrr_group`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;","

		ALTER TABLE `wp_trkrr_groups`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;","

		ALTER TABLE `wp_trkrr_group_type`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;","

		ALTER TABLE `wp_trkrr_links`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;","

		ALTER TABLE `wp_trkrr_link_stat`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;","

		ALTER TABLE `wp_trkrr_rotator`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;","

		ALTER TABLE `wp_trkrr_typeofconversion`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;","

		ALTER TABLE `wp_trkrr_typeofcost`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;","

		ALTER TABLE `wp_trkrr_typeofdestination`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;","

		ALTER TABLE `wp_trkrr_typeoflink`
		  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;","
		COMMIT;");
		
		global $wpdb;
				
        foreach($alter_array as $alter){
			$wpdb->query($alter);
		}
    }

    function deactivate() {
    
        // This call needs to be made to deactivate this app within WP MVC
        
        $this->deactivate_app(__FILE__);
        
        // Perform any databases modifications related to plugin deactivation here, if necessary
    
    }

}

?>