UPDATE `settings` SET `value` = '{\"version\":\"59.0.0\", \"code\":\"5900\"}' WHERE `key` = 'product_info';

-- SEPARATOR --

alter table track_links add project_id int null after biolink_block_id;

-- SEPARATOR --

UPDATE track_links JOIN links ON track_links.link_id = links.link_id SET track_links.project_id = links.project_id;

-- SEPARATOR --

alter table track_links add constraint track_links_projects_project_id_fk foreign key (project_id) references projects (project_id) on update cascade on delete set null;

-- SEPARATOR --

alter table pages add plans_ids text null after pages_category_id;

-- SEPARATOR --

alter table links add email_reports_count tinyint default 0 null after email_reports_last_datetime;

-- SEPARATOR --

create index links_email_reports_count_index on links (email_reports_count);
