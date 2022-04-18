/* créer une liste, qui aura un nom et une ou plusieurs tâches associées 
/* créer une tâche qui aura un nom et un status avec une clé étranger list_id */
/* MariaDB */


CREATE TABLE `list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `list_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `list_id` (`list_id`),
  CONSTRAINT `task_ibfk` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* PostgreSQL */


CREATE TABLE "list" (
  "list_id" serial NOT NULL,
  "list_name" character varying(255) NOT NULL,
  CONSTRAINT "list_pkey" PRIMARY KEY ("list_id")
) WITH (
  OIDS=FALSE
);


CREATE TABLE "task" (
  "task_id" serial NOT NULL,
  "task_name" character varying(255) NOT NULL,
  "task_status" character varying(255) NOT NULL,
  "list_id" integer NOT NULL,
  CONSTRAINT "task_pkey" PRIMARY KEY ("task_id"),
  CONSTRAINT "task_list_id_fkey" FOREIGN KEY ("list_id")
      REFERENCES "list" ("list_id") MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
) WITH (
  OIDS=FALSE
);


CREATE INDEX "task_list_id_fkey" ON "task"
  USING btree
  ("list_id");

