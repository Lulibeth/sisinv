--
-- PostgreSQL database cluster dump
--

-- Started on 2020-11-08 10:56:07

SET default_transaction_read_only = off;

SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;

--
-- Roles
--

CREATE ROLE postgres;
ALTER ROLE postgres WITH SUPERUSER INHERIT CREATEROLE CREATEDB LOGIN REPLICATION BYPASSRLS PASSWORD 'md5738d021d4bc194576641fa9936656836';
CREATE ROLE sisinv;
ALTER ROLE sisinv WITH SUPERUSER INHERIT CREATEROLE CREATEDB LOGIN REPLICATION NOBYPASSRLS PASSWORD 'md54dc64a12762938dd8df347b637e5ac3d' VALID UNTIL 'infinity';






--
-- Database creation
--

CREATE DATABASE canciones WITH TEMPLATE = template0 OWNER = postgres;
CREATE DATABASE sisinv WITH TEMPLATE = template0 OWNER = sisinv;
REVOKE ALL ON DATABASE template1 FROM PUBLIC;
REVOKE ALL ON DATABASE template1 FROM postgres;
GRANT ALL ON DATABASE template1 TO postgres;
GRANT CONNECT ON DATABASE template1 TO PUBLIC;


\connect canciones

SET default_transaction_read_only = off;

--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.16
-- Dumped by pg_dump version 9.5.16

-- Started on 2020-11-08 10:56:07

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 8 (class 2615 OID 41451)
-- Name: usuario; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA usuario;


ALTER SCHEMA usuario OWNER TO postgres;

--
-- TOC entry 1 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2114 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 183 (class 1259 OID 41466)
-- Name: canciones; Type: TABLE; Schema: usuario; Owner: postgres
--

CREATE TABLE usuario.canciones (
    id integer NOT NULL,
    nombre_c character varying(120),
    nombre_a character varying(50),
    album character varying,
    estatus integer
);


ALTER TABLE usuario.canciones OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 41452)
-- Name: login; Type: TABLE; Schema: usuario; Owner: postgres
--

CREATE TABLE usuario.login (
    id integer NOT NULL,
    nombre character varying,
    usuario character varying(100),
    password character varying(100),
    estatus integer
);


ALTER TABLE usuario.login OWNER TO postgres;

--
-- TOC entry 2105 (class 0 OID 41466)
-- Dependencies: 183
-- Data for Name: canciones; Type: TABLE DATA; Schema: usuario; Owner: postgres
--

COPY usuario.canciones (id, nombre_c, nombre_a, album, estatus) FROM stdin;
\.


--
-- TOC entry 2104 (class 0 OID 41452)
-- Dependencies: 182
-- Data for Name: login; Type: TABLE DATA; Schema: usuario; Owner: postgres
--

COPY usuario.login (id, nombre, usuario, password, estatus) FROM stdin;
1	Lulu	lulu123	1231	1
\.


--
-- TOC entry 1987 (class 2606 OID 41459)
-- Name: id; Type: CONSTRAINT; Schema: usuario; Owner: postgres
--

ALTER TABLE ONLY usuario.login
    ADD CONSTRAINT id PRIMARY KEY (id);


--
-- TOC entry 1989 (class 2606 OID 41473)
-- Name: id_login; Type: CONSTRAINT; Schema: usuario; Owner: postgres
--

ALTER TABLE ONLY usuario.canciones
    ADD CONSTRAINT id_login PRIMARY KEY (id);


--
-- TOC entry 2113 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2020-11-08 10:56:07

--
-- PostgreSQL database dump complete
--

\connect postgres

SET default_transaction_read_only = off;

--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.16
-- Dumped by pg_dump version 9.5.16

-- Started on 2020-11-08 10:56:07

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2096 (class 0 OID 0)
-- Dependencies: 2095
-- Name: DATABASE postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- TOC entry 2 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2099 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 1 (class 3079 OID 16384)
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- TOC entry 2100 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


--
-- TOC entry 2098 (class 0 OID 0)
-- Dependencies: 7
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2020-11-08 10:56:07

--
-- PostgreSQL database dump complete
--

\connect sisinv

SET default_transaction_read_only = off;

--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.16
-- Dumped by pg_dump version 9.5.16

-- Started on 2020-11-08 10:56:08

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 8 (class 2615 OID 16396)
-- Name: empresa; Type: SCHEMA; Schema: -; Owner: sisinv
--

CREATE SCHEMA empresa;


ALTER SCHEMA empresa OWNER TO sisinv;

--
-- TOC entry 10 (class 2615 OID 16411)
-- Name: factu_inv; Type: SCHEMA; Schema: -; Owner: sisinv
--

CREATE SCHEMA factu_inv;


ALTER SCHEMA factu_inv OWNER TO sisinv;

--
-- TOC entry 9 (class 2615 OID 16409)
-- Name: persona; Type: SCHEMA; Schema: -; Owner: sisinv
--

CREATE SCHEMA persona;


ALTER SCHEMA persona OWNER TO sisinv;

--
-- TOC entry 1 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2340 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 194 (class 1259 OID 16445)
-- Name: cargo; Type: TABLE; Schema: empresa; Owner: sisinv
--

CREATE TABLE empresa.cargo (
    id bigint NOT NULL,
    nombre character varying(500),
    estatus integer,
    usuario integer
);


ALTER TABLE empresa.cargo OWNER TO sisinv;

--
-- TOC entry 195 (class 1259 OID 16448)
-- Name: cargo_id_seq; Type: SEQUENCE; Schema: empresa; Owner: sisinv
--

CREATE SEQUENCE empresa.cargo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE empresa.cargo_id_seq OWNER TO sisinv;

--
-- TOC entry 2341 (class 0 OID 0)
-- Dependencies: 195
-- Name: cargo_id_seq; Type: SEQUENCE OWNED BY; Schema: empresa; Owner: sisinv
--

ALTER SEQUENCE empresa.cargo_id_seq OWNED BY empresa.cargo.id;


--
-- TOC entry 184 (class 1259 OID 16397)
-- Name: empresa; Type: TABLE; Schema: empresa; Owner: sisinv
--

CREATE TABLE empresa.empresa (
    id bigint NOT NULL,
    nombre character varying(500),
    direccion character varying(500),
    estatus integer,
    rif character varying(500),
    fecha timestamp(5) with time zone,
    ip character varying(50),
    num_telef bigint
);


ALTER TABLE empresa.empresa OWNER TO sisinv;

--
-- TOC entry 185 (class 1259 OID 16400)
-- Name: empresa_id_seq; Type: SEQUENCE; Schema: empresa; Owner: sisinv
--

CREATE SEQUENCE empresa.empresa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE empresa.empresa_id_seq OWNER TO sisinv;

--
-- TOC entry 2342 (class 0 OID 0)
-- Dependencies: 185
-- Name: empresa_id_seq; Type: SEQUENCE OWNED BY; Schema: empresa; Owner: sisinv
--

ALTER SEQUENCE empresa.empresa_id_seq OWNED BY empresa.empresa.id;


--
-- TOC entry 193 (class 1259 OID 16442)
-- Name: telefono; Type: TABLE; Schema: empresa; Owner: postgres
--

CREATE TABLE empresa.telefono (
    id bigint NOT NULL,
    codigo integer,
    numero integer,
    estatus integer,
    empresa character varying(100),
    usuario character varying(100),
    ip bigint
);


ALTER TABLE empresa.telefono OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16454)
-- Name: telefono_id_seq; Type: SEQUENCE; Schema: empresa; Owner: postgres
--

CREATE SEQUENCE empresa.telefono_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE empresa.telefono_id_seq OWNER TO postgres;

--
-- TOC entry 2343 (class 0 OID 0)
-- Dependencies: 196
-- Name: telefono_id_seq; Type: SEQUENCE OWNED BY; Schema: empresa; Owner: postgres
--

ALTER SEQUENCE empresa.telefono_id_seq OWNED BY empresa.telefono.id;


--
-- TOC entry 213 (class 1259 OID 41532)
-- Name: articulo; Type: TABLE; Schema: factu_inv; Owner: sisinv
--

CREATE TABLE factu_inv.articulo (
    id bigint NOT NULL,
    descripcion character varying(500),
    estatus integer,
    usuario integer,
    ip character varying(50),
    fecha timestamp with time zone
);


ALTER TABLE factu_inv.articulo OWNER TO sisinv;

--
-- TOC entry 212 (class 1259 OID 41530)
-- Name: articulo_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: sisinv
--

CREATE SEQUENCE factu_inv.articulo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.articulo_id_seq OWNER TO sisinv;

--
-- TOC entry 2344 (class 0 OID 0)
-- Dependencies: 212
-- Name: articulo_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: sisinv
--

ALTER SEQUENCE factu_inv.articulo_id_seq OWNED BY factu_inv.articulo.id;


--
-- TOC entry 190 (class 1259 OID 16430)
-- Name: deta_fac; Type: TABLE; Schema: factu_inv; Owner: postgres
--

CREATE TABLE factu_inv.deta_fac (
    id bigint NOT NULL,
    producto character varying(500),
    cantidad integer,
    precio_u money,
    precio_t money,
    estatus integer,
    fecha timestamp(5) without time zone,
    usuario character varying(100),
    ip bigint
);


ALTER TABLE factu_inv.deta_fac OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16460)
-- Name: deta_fac_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: postgres
--

CREATE SEQUENCE factu_inv.deta_fac_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.deta_fac_id_seq OWNER TO postgres;

--
-- TOC entry 2345 (class 0 OID 0)
-- Dependencies: 197
-- Name: deta_fac_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: postgres
--

ALTER SEQUENCE factu_inv.deta_fac_id_seq OWNED BY factu_inv.deta_fac.id;


--
-- TOC entry 188 (class 1259 OID 16424)
-- Name: estado; Type: TABLE; Schema: factu_inv; Owner: sisinv
--

CREATE TABLE factu_inv.estado (
    id bigint NOT NULL,
    excelente character varying(500),
    mejorable character varying(500),
    deteriorado character varying(500),
    estatus integer,
    usaurio character varying(100),
    ip bigint
);


ALTER TABLE factu_inv.estado OWNER TO sisinv;

--
-- TOC entry 198 (class 1259 OID 16466)
-- Name: estado_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: sisinv
--

CREATE SEQUENCE factu_inv.estado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.estado_id_seq OWNER TO sisinv;

--
-- TOC entry 2346 (class 0 OID 0)
-- Dependencies: 198
-- Name: estado_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: sisinv
--

ALTER SEQUENCE factu_inv.estado_id_seq OWNED BY factu_inv.estado.id;


--
-- TOC entry 189 (class 1259 OID 16427)
-- Name: factura; Type: TABLE; Schema: factu_inv; Owner: postgres
--

CREATE TABLE factu_inv.factura (
    id bigint NOT NULL,
    idpersona integer,
    sub_t money,
    total_iva money,
    total_f money,
    estatus integer,
    usuario integer,
    fecha timestamp(5) with time zone,
    ip character varying(50)
);


ALTER TABLE factu_inv.factura OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16472)
-- Name: factura_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: postgres
--

CREATE SEQUENCE factu_inv.factura_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.factura_id_seq OWNER TO postgres;

--
-- TOC entry 2347 (class 0 OID 0)
-- Dependencies: 199
-- Name: factura_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: postgres
--

ALTER SEQUENCE factu_inv.factura_id_seq OWNED BY factu_inv.factura.id;


--
-- TOC entry 187 (class 1259 OID 16421)
-- Name: iva; Type: TABLE; Schema: factu_inv; Owner: sisinv
--

CREATE TABLE factu_inv.iva (
    id bigint NOT NULL,
    descripcion character varying(500),
    estatus integer,
    usuario integer,
    fecha timestamp(5) with time zone,
    ip character varying(50),
    n_calcular real
);


ALTER TABLE factu_inv.iva OWNER TO sisinv;

--
-- TOC entry 200 (class 1259 OID 16478)
-- Name: iva_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: sisinv
--

CREATE SEQUENCE factu_inv.iva_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.iva_id_seq OWNER TO sisinv;

--
-- TOC entry 2348 (class 0 OID 0)
-- Dependencies: 200
-- Name: iva_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: sisinv
--

ALTER SEQUENCE factu_inv.iva_id_seq OWNED BY factu_inv.iva.id;


--
-- TOC entry 217 (class 1259 OID 49788)
-- Name: producto; Type: TABLE; Schema: factu_inv; Owner: sisinv
--

CREATE TABLE factu_inv.producto (
    id bigint NOT NULL,
    articulo bigint,
    tipo_articulo bigint,
    talla bigint,
    proveedor bigint,
    cantidad bigint,
    precio money,
    fecha timestamp with time zone,
    estatus integer,
    usuario integer,
    ip character varying(50),
    iva bigint,
    valort money
);


ALTER TABLE factu_inv.producto OWNER TO sisinv;

--
-- TOC entry 216 (class 1259 OID 49786)
-- Name: producto_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: sisinv
--

CREATE SEQUENCE factu_inv.producto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.producto_id_seq OWNER TO sisinv;

--
-- TOC entry 2349 (class 0 OID 0)
-- Dependencies: 216
-- Name: producto_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: sisinv
--

ALTER SEQUENCE factu_inv.producto_id_seq OWNED BY factu_inv.producto.id;


--
-- TOC entry 211 (class 1259 OID 41511)
-- Name: proveedor; Type: TABLE; Schema: factu_inv; Owner: sisinv
--

CREATE TABLE factu_inv.proveedor (
    id bigint NOT NULL,
    descripcion character varying(500),
    rif character varying(20),
    telefono character varying(20),
    telefono_f character varying(20),
    estatus integer,
    usuario integer,
    ip character varying(50)
);


ALTER TABLE factu_inv.proveedor OWNER TO sisinv;

--
-- TOC entry 210 (class 1259 OID 41509)
-- Name: proveedor_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: sisinv
--

CREATE SEQUENCE factu_inv.proveedor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.proveedor_id_seq OWNER TO sisinv;

--
-- TOC entry 2350 (class 0 OID 0)
-- Dependencies: 210
-- Name: proveedor_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: sisinv
--

ALTER SEQUENCE factu_inv.proveedor_id_seq OWNED BY factu_inv.proveedor.id;


--
-- TOC entry 209 (class 1259 OID 33237)
-- Name: talla; Type: TABLE; Schema: factu_inv; Owner: sisinv
--

CREATE TABLE factu_inv.talla (
    id bigint NOT NULL,
    descripcion character varying(500),
    estatus integer
);


ALTER TABLE factu_inv.talla OWNER TO sisinv;

--
-- TOC entry 208 (class 1259 OID 33235)
-- Name: talla_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: sisinv
--

CREATE SEQUENCE factu_inv.talla_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.talla_id_seq OWNER TO sisinv;

--
-- TOC entry 2351 (class 0 OID 0)
-- Dependencies: 208
-- Name: talla_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: sisinv
--

ALTER SEQUENCE factu_inv.talla_id_seq OWNED BY factu_inv.talla.id;


--
-- TOC entry 186 (class 1259 OID 16415)
-- Name: tip_produ; Type: TABLE; Schema: factu_inv; Owner: sisinv
--

CREATE TABLE factu_inv.tip_produ (
    id bigint NOT NULL,
    descripcion character varying(500),
    estatus integer,
    usuario integer,
    fecha timestamp(5) with time zone,
    ip character varying(50)
);


ALTER TABLE factu_inv.tip_produ OWNER TO sisinv;

--
-- TOC entry 201 (class 1259 OID 16497)
-- Name: tip_produ_id_seq; Type: SEQUENCE; Schema: factu_inv; Owner: sisinv
--

CREATE SEQUENCE factu_inv.tip_produ_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE factu_inv.tip_produ_id_seq OWNER TO sisinv;

--
-- TOC entry 2352 (class 0 OID 0)
-- Dependencies: 201
-- Name: tip_produ_id_seq; Type: SEQUENCE OWNED BY; Schema: factu_inv; Owner: sisinv
--

ALTER SEQUENCE factu_inv.tip_produ_id_seq OWNED BY factu_inv.tip_produ.id;


--
-- TOC entry 207 (class 1259 OID 16817)
-- Name: carg_pers; Type: TABLE; Schema: persona; Owner: postgres
--

CREATE TABLE persona.carg_pers (
    id bigint NOT NULL,
    descripcion character varying(500),
    persona integer,
    cargo integer,
    usuario integer,
    estatus integer,
    usuario_registrto integer,
    fecha timestamp(5) with time zone,
    ip character varying(50)
);


ALTER TABLE persona.carg_pers OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16815)
-- Name: carg_pers_id_seq; Type: SEQUENCE; Schema: persona; Owner: postgres
--

CREATE SEQUENCE persona.carg_pers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE persona.carg_pers_id_seq OWNER TO postgres;

--
-- TOC entry 2353 (class 0 OID 0)
-- Dependencies: 206
-- Name: carg_pers_id_seq; Type: SEQUENCE OWNED BY; Schema: persona; Owner: postgres
--

ALTER SEQUENCE persona.carg_pers_id_seq OWNED BY persona.carg_pers.id;


--
-- TOC entry 191 (class 1259 OID 16433)
-- Name: persona; Type: TABLE; Schema: persona; Owner: postgres
--

CREATE TABLE persona.persona (
    id bigint NOT NULL,
    cedula integer,
    nombre character varying(500),
    apellido character varying(500),
    direccion character varying(500),
    telefono numeric,
    estatus integer,
    fecha timestamp with time zone,
    ip character varying(50),
    precedu character varying(2),
    usuario character varying(400)
);


ALTER TABLE persona.persona OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16509)
-- Name: persona_id_seq; Type: SEQUENCE; Schema: persona; Owner: postgres
--

CREATE SEQUENCE persona.persona_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE persona.persona_id_seq OWNER TO postgres;

--
-- TOC entry 2354 (class 0 OID 0)
-- Dependencies: 202
-- Name: persona_id_seq; Type: SEQUENCE OWNED BY; Schema: persona; Owner: postgres
--

ALTER SEQUENCE persona.persona_id_seq OWNED BY persona.persona.id;


--
-- TOC entry 192 (class 1259 OID 16439)
-- Name: usuario; Type: TABLE; Schema: persona; Owner: postgres
--

CREATE TABLE persona.usuario (
    id bigint NOT NULL,
    usuario character varying(500),
    clave character varying(500),
    estatus integer,
    idpersona integer,
    idcarg_pers integer,
    fecha timestamp with time zone,
    ip character varying(50)
);


ALTER TABLE persona.usuario OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16515)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: persona; Owner: postgres
--

CREATE SEQUENCE persona.usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE persona.usuario_id_seq OWNER TO postgres;

--
-- TOC entry 2355 (class 0 OID 0)
-- Dependencies: 203
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: persona; Owner: postgres
--

ALTER SEQUENCE persona.usuario_id_seq OWNED BY persona.usuario.id;


--
-- TOC entry 215 (class 1259 OID 41596)
-- Name: codigo_secreto; Type: TABLE; Schema: public; Owner: sisinv
--

CREATE TABLE public.codigo_secreto (
    id bigint NOT NULL,
    codigo character varying(500),
    fecha timestamp with time zone,
    ip character varying(500),
    tipo_ integer,
    id_persona integer,
    correo character varying(500),
    estatus integer
);


ALTER TABLE public.codigo_secreto OWNER TO sisinv;

--
-- TOC entry 214 (class 1259 OID 41594)
-- Name: codigo_secreto_id_seq; Type: SEQUENCE; Schema: public; Owner: sisinv
--

CREATE SEQUENCE public.codigo_secreto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.codigo_secreto_id_seq OWNER TO sisinv;

--
-- TOC entry 2356 (class 0 OID 0)
-- Dependencies: 214
-- Name: codigo_secreto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sisinv
--

ALTER SEQUENCE public.codigo_secreto_id_seq OWNED BY public.codigo_secreto.id;


--
-- TOC entry 205 (class 1259 OID 16523)
-- Name: estatus; Type: TABLE; Schema: public; Owner: sisinv
--

CREATE TABLE public.estatus (
    id bigint NOT NULL,
    nombre character varying(500),
    estatus integer
);


ALTER TABLE public.estatus OWNER TO sisinv;

--
-- TOC entry 204 (class 1259 OID 16521)
-- Name: estatus_id_seq; Type: SEQUENCE; Schema: public; Owner: sisinv
--

CREATE SEQUENCE public.estatus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estatus_id_seq OWNER TO sisinv;

--
-- TOC entry 2357 (class 0 OID 0)
-- Dependencies: 204
-- Name: estatus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: sisinv
--

ALTER SEQUENCE public.estatus_id_seq OWNED BY public.estatus.id;


--
-- TOC entry 2103 (class 2604 OID 16450)
-- Name: id; Type: DEFAULT; Schema: empresa; Owner: sisinv
--

ALTER TABLE ONLY empresa.cargo ALTER COLUMN id SET DEFAULT nextval('empresa.cargo_id_seq'::regclass);


--
-- TOC entry 2094 (class 2604 OID 16402)
-- Name: id; Type: DEFAULT; Schema: empresa; Owner: sisinv
--

ALTER TABLE ONLY empresa.empresa ALTER COLUMN id SET DEFAULT nextval('empresa.empresa_id_seq'::regclass);


--
-- TOC entry 2102 (class 2604 OID 16456)
-- Name: id; Type: DEFAULT; Schema: empresa; Owner: postgres
--

ALTER TABLE ONLY empresa.telefono ALTER COLUMN id SET DEFAULT nextval('empresa.telefono_id_seq'::regclass);


--
-- TOC entry 2108 (class 2604 OID 41535)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.articulo ALTER COLUMN id SET DEFAULT nextval('factu_inv.articulo_id_seq'::regclass);


--
-- TOC entry 2099 (class 2604 OID 16462)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: postgres
--

ALTER TABLE ONLY factu_inv.deta_fac ALTER COLUMN id SET DEFAULT nextval('factu_inv.deta_fac_id_seq'::regclass);


--
-- TOC entry 2097 (class 2604 OID 16468)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.estado ALTER COLUMN id SET DEFAULT nextval('factu_inv.estado_id_seq'::regclass);


--
-- TOC entry 2098 (class 2604 OID 16474)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: postgres
--

ALTER TABLE ONLY factu_inv.factura ALTER COLUMN id SET DEFAULT nextval('factu_inv.factura_id_seq'::regclass);


--
-- TOC entry 2096 (class 2604 OID 16480)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.iva ALTER COLUMN id SET DEFAULT nextval('factu_inv.iva_id_seq'::regclass);


--
-- TOC entry 2110 (class 2604 OID 49791)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.producto ALTER COLUMN id SET DEFAULT nextval('factu_inv.producto_id_seq'::regclass);


--
-- TOC entry 2107 (class 2604 OID 41514)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.proveedor ALTER COLUMN id SET DEFAULT nextval('factu_inv.proveedor_id_seq'::regclass);


--
-- TOC entry 2106 (class 2604 OID 33240)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.talla ALTER COLUMN id SET DEFAULT nextval('factu_inv.talla_id_seq'::regclass);


--
-- TOC entry 2095 (class 2604 OID 16499)
-- Name: id; Type: DEFAULT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.tip_produ ALTER COLUMN id SET DEFAULT nextval('factu_inv.tip_produ_id_seq'::regclass);


--
-- TOC entry 2105 (class 2604 OID 16820)
-- Name: id; Type: DEFAULT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.carg_pers ALTER COLUMN id SET DEFAULT nextval('persona.carg_pers_id_seq'::regclass);


--
-- TOC entry 2100 (class 2604 OID 16511)
-- Name: id; Type: DEFAULT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.persona ALTER COLUMN id SET DEFAULT nextval('persona.persona_id_seq'::regclass);


--
-- TOC entry 2101 (class 2604 OID 16517)
-- Name: id; Type: DEFAULT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.usuario ALTER COLUMN id SET DEFAULT nextval('persona.usuario_id_seq'::regclass);


--
-- TOC entry 2109 (class 2604 OID 41599)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sisinv
--

ALTER TABLE ONLY public.codigo_secreto ALTER COLUMN id SET DEFAULT nextval('public.codigo_secreto_id_seq'::regclass);


--
-- TOC entry 2104 (class 2604 OID 16526)
-- Name: id; Type: DEFAULT; Schema: public; Owner: sisinv
--

ALTER TABLE ONLY public.estatus ALTER COLUMN id SET DEFAULT nextval('public.estatus_id_seq'::regclass);


--
-- TOC entry 2308 (class 0 OID 16445)
-- Dependencies: 194
-- Data for Name: cargo; Type: TABLE DATA; Schema: empresa; Owner: sisinv
--

COPY empresa.cargo (id, nombre, estatus, usuario) FROM stdin;
1	ADMINISTRADOR	1	\N
2	PROPIETARIO	1	\N
3	EMPLEADO	1	\N
\.


--
-- TOC entry 2358 (class 0 OID 0)
-- Dependencies: 195
-- Name: cargo_id_seq; Type: SEQUENCE SET; Schema: empresa; Owner: sisinv
--

SELECT pg_catalog.setval('empresa.cargo_id_seq', 12, true);


--
-- TOC entry 2298 (class 0 OID 16397)
-- Dependencies: 184
-- Data for Name: empresa; Type: TABLE DATA; Schema: empresa; Owner: sisinv
--

COPY empresa.empresa (id, nombre, direccion, estatus, rif, fecha, ip, num_telef) FROM stdin;
1	JULIO	BRISAS DEL TORBES	1	V-123567	2020-01-31 00:00:00-04	127.0.0.1	4121172423
3	UYHH	9IK9K	2	E-777	2020-02-17 00:00:00-04	127.0.0.1	42465555
2	GHJKL	GHJKL	2	V-456789	2020-01-31 00:00:00-04	127.0.0.1	456789
4	UPTAI	LA CONCORDIA	1	G-200002432	2020-02-27 00:00:00-04	127.0.0.1	276346122
5	LAS MANZANAS	BRISAS DEL TORBES	1	E-21212121	2020-11-05 00:00:00-04	127.0.0.1	3232321
\.


--
-- TOC entry 2359 (class 0 OID 0)
-- Dependencies: 185
-- Name: empresa_id_seq; Type: SEQUENCE SET; Schema: empresa; Owner: sisinv
--

SELECT pg_catalog.setval('empresa.empresa_id_seq', 5, true);


--
-- TOC entry 2307 (class 0 OID 16442)
-- Dependencies: 193
-- Data for Name: telefono; Type: TABLE DATA; Schema: empresa; Owner: postgres
--

COPY empresa.telefono (id, codigo, numero, estatus, empresa, usuario, ip) FROM stdin;
\.


--
-- TOC entry 2360 (class 0 OID 0)
-- Dependencies: 196
-- Name: telefono_id_seq; Type: SEQUENCE SET; Schema: empresa; Owner: postgres
--

SELECT pg_catalog.setval('empresa.telefono_id_seq', 1, false);


--
-- TOC entry 2327 (class 0 OID 41532)
-- Dependencies: 213
-- Data for Name: articulo; Type: TABLE DATA; Schema: factu_inv; Owner: sisinv
--

COPY factu_inv.articulo (id, descripcion, estatus, usuario, ip, fecha) FROM stdin;
2	CAMISA	1	1	127.0.0.1	\N
6	VESTIDO	1	1	127.0.0.1	\N
8	MEDIAS	1	1	127.0.0.1	\N
1	PANTALON	1	\N	\N	\N
9	ZAPATOE	2	1	127.0.0.1	2020-02-23 11:02:51-04
\.


--
-- TOC entry 2361 (class 0 OID 0)
-- Dependencies: 212
-- Name: articulo_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: sisinv
--

SELECT pg_catalog.setval('factu_inv.articulo_id_seq', 9, true);


--
-- TOC entry 2304 (class 0 OID 16430)
-- Dependencies: 190
-- Data for Name: deta_fac; Type: TABLE DATA; Schema: factu_inv; Owner: postgres
--

COPY factu_inv.deta_fac (id, producto, cantidad, precio_u, precio_t, estatus, fecha, usuario, ip) FROM stdin;
\.


--
-- TOC entry 2362 (class 0 OID 0)
-- Dependencies: 197
-- Name: deta_fac_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: postgres
--

SELECT pg_catalog.setval('factu_inv.deta_fac_id_seq', 1, false);


--
-- TOC entry 2302 (class 0 OID 16424)
-- Dependencies: 188
-- Data for Name: estado; Type: TABLE DATA; Schema: factu_inv; Owner: sisinv
--

COPY factu_inv.estado (id, excelente, mejorable, deteriorado, estatus, usaurio, ip) FROM stdin;
\.


--
-- TOC entry 2363 (class 0 OID 0)
-- Dependencies: 198
-- Name: estado_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: sisinv
--

SELECT pg_catalog.setval('factu_inv.estado_id_seq', 1, false);


--
-- TOC entry 2303 (class 0 OID 16427)
-- Dependencies: 189
-- Data for Name: factura; Type: TABLE DATA; Schema: factu_inv; Owner: postgres
--

COPY factu_inv.factura (id, idpersona, sub_t, total_iva, total_f, estatus, usuario, fecha, ip) FROM stdin;
\.


--
-- TOC entry 2364 (class 0 OID 0)
-- Dependencies: 199
-- Name: factura_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: postgres
--

SELECT pg_catalog.setval('factu_inv.factura_id_seq', 1, false);


--
-- TOC entry 2301 (class 0 OID 16421)
-- Dependencies: 187
-- Data for Name: iva; Type: TABLE DATA; Schema: factu_inv; Owner: sisinv
--

COPY factu_inv.iva (id, descripcion, estatus, usuario, fecha, ip, n_calcular) FROM stdin;
4	25%	1	1	2020-02-09 10:50:09-04	127.0.0.1	0.25
5	12%	1	1	2020-02-23 10:55:48-04	127.0.0.1	0.119999997
6	20%	1	1	2020-02-23 11:11:37-04	127.0.0.1	0.200000003
8	50%	1	1	2020-02-23 11:20:41-04	127.0.0.1	0.5
\.


--
-- TOC entry 2365 (class 0 OID 0)
-- Dependencies: 200
-- Name: iva_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: sisinv
--

SELECT pg_catalog.setval('factu_inv.iva_id_seq', 8, true);


--
-- TOC entry 2331 (class 0 OID 49788)
-- Dependencies: 217
-- Data for Name: producto; Type: TABLE DATA; Schema: factu_inv; Owner: sisinv
--

COPY factu_inv.producto (id, articulo, tipo_articulo, talla, proveedor, cantidad, precio, fecha, estatus, usuario, ip, iva, valort) FROM stdin;
1	2	2	2	6	7	400.000.000,00 €	2000-12-12 00:00:00-04	1	1	127.0.0.1	4	5.889,00 €
2	2	2	2	6	7	400.000.000,00 €	2000-12-12 00:00:00-04	1	1	127.0.0.1	5	45.345,00 €
3	1	10	2	6	15	10.000.000,00 €	2000-12-12 00:00:00-04	1	1	127.0.0.1	6	345.345,00 €
5	2	2	2	6	3500	500.000,00 €	2000-12-12 00:00:00-04	2	1	127.0.0.1	5	560.000,00 €
4	1	2	2	6	6	12.000,00 €	2000-12-12 00:00:00-04	1	1	127.0.0.1	8	45.345,00 €
6	2	11	2	6	300	500.000,00 €	2020-10-12 00:00:00-04	1	1	127.0.0.1	5	560.000,00 €
\.


--
-- TOC entry 2366 (class 0 OID 0)
-- Dependencies: 216
-- Name: producto_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: sisinv
--

SELECT pg_catalog.setval('factu_inv.producto_id_seq', 6, true);


--
-- TOC entry 2325 (class 0 OID 41511)
-- Dependencies: 211
-- Data for Name: proveedor; Type: TABLE DATA; Schema: factu_inv; Owner: sisinv
--

COPY factu_inv.proveedor (id, descripcion, rif, telefono, telefono_f, estatus, usuario, ip) FROM stdin;
6	JUAN PEDRO	V-23456789	0414789006	026778899	1	1	127.0.0.1
7	HOLA	V-21002331	04120593997	0665656567	1	1	127.0.0.1
8		Seleccion			1	1	127.0.0.1
\.


--
-- TOC entry 2367 (class 0 OID 0)
-- Dependencies: 210
-- Name: proveedor_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: sisinv
--

SELECT pg_catalog.setval('factu_inv.proveedor_id_seq', 8, true);


--
-- TOC entry 2323 (class 0 OID 33237)
-- Dependencies: 209
-- Data for Name: talla; Type: TABLE DATA; Schema: factu_inv; Owner: sisinv
--

COPY factu_inv.talla (id, descripcion, estatus) FROM stdin;
2	M	1
3	L	1
4	X	1
8	R	2
60	X	1
5	XL	2
62	T	2
63	T	1
64	XXL	1
65	XXL	2
\.


--
-- TOC entry 2368 (class 0 OID 0)
-- Dependencies: 208
-- Name: talla_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: sisinv
--

SELECT pg_catalog.setval('factu_inv.talla_id_seq', 65, true);


--
-- TOC entry 2300 (class 0 OID 16415)
-- Dependencies: 186
-- Data for Name: tip_produ; Type: TABLE DATA; Schema: factu_inv; Owner: sisinv
--

COPY factu_inv.tip_produ (id, descripcion, estatus, usuario, fecha, ip) FROM stdin;
2	CABALLERO	1	1	2020-01-31 21:27:17-04	127.0.0.1
11	NIÑA	2	1	2020-02-23 11:03:25-04	127.0.0.1
10	CABALLERO	1	1	2020-02-23 10:55:01-04	127.0.0.1
\.


--
-- TOC entry 2369 (class 0 OID 0)
-- Dependencies: 201
-- Name: tip_produ_id_seq; Type: SEQUENCE SET; Schema: factu_inv; Owner: sisinv
--

SELECT pg_catalog.setval('factu_inv.tip_produ_id_seq', 12, true);


--
-- TOC entry 2321 (class 0 OID 16817)
-- Dependencies: 207
-- Data for Name: carg_pers; Type: TABLE DATA; Schema: persona; Owner: postgres
--

COPY persona.carg_pers (id, descripcion, persona, cargo, usuario, estatus, usuario_registrto, fecha, ip) FROM stdin;
1	g	1	1	1	1	\N	\N	\N
2	asd	19	2	2	1	\N	\N	\N
\.


--
-- TOC entry 2370 (class 0 OID 0)
-- Dependencies: 206
-- Name: carg_pers_id_seq; Type: SEQUENCE SET; Schema: persona; Owner: postgres
--

SELECT pg_catalog.setval('persona.carg_pers_id_seq', 1, false);


--
-- TOC entry 2305 (class 0 OID 16433)
-- Dependencies: 191
-- Data for Name: persona; Type: TABLE DATA; Schema: persona; Owner: postgres
--

COPY persona.persona (id, cedula, nombre, apellido, direccion, telefono, estatus, fecha, ip, precedu, usuario) FROM stdin;
1	3234243	NOSLEN	MORENO	uyuiyui	87678687	1	\N	\r	\N	\N
16	534	876543J	MORENO	BRISAS DEL TORBES 	453	1	2020-02-11 00:00:00-04	127.0.0.1	V-	\N
6	2312	AHORA SI	EDITA	CALLE MANZANA 1 CASA NRO 9 URB LOS TAQUES	456	1	2020-02-11 00:00:00-04	127.0.0.1	V-	\N
11	87654	JHONATHAN	CANHICA	CALLE MANZANA 1 CASA NRO 9 URB LOS TAQUES	4120593997	1	2020-02-11 00:00:00-04	127.0.0.1	V-	\N
17	12680	SER	S	BRISAS DEL LOCO	42472	1	2020-02-12 00:00:00-04	127.0.0.1	V-	\N
18	5021434	LULU	MORENO	CALLE MANZANA 1 CASA NRO 9 URB LOS TAQUES	4120593997	1	2020-02-12 00:00:00-04	127.0.0.1	V-	\N
20	13352834	WIRSSY1	GAMBOA	SAN ANDRES	4161761763	1	2020-02-17 00:00:00-04	127.0.0.1		1
19	21002331	JHONATHAN	CANHICA	CALLE MANZANA 1 CASA NRO 9 URB LOS TAQUES	4124731511	1	2020-02-15 00:00:00-04	127.0.0.1	V-	\N
21	123456	HOLA TU	COMO ESTAS 	CAPACHO	2678675	1	2020-02-20 00:00:00-04	127.0.0.1		1
22	12516469	LISBETH	SOSA	LA CONCORDIA 	4167775150	1	2020-02-20 00:00:00-04	127.0.0.1		1
23	13288435	LEYVIS	CASTRO	LA CONCORDIA 	4146766566	1	2020-02-27 00:00:00-04	127.0.0.1	V-	1
24	3309192	LUIS	SOSA	GRGTGTGTG	23232323	1	2020-09-29 00:00:00-04	127.0.0.1	V-	1
25	809912	MARIA	MARTINEZ	TARIBA	414566789	1	2020-11-05 00:00:00-04	127.0.0.1	E-	1
\.


--
-- TOC entry 2371 (class 0 OID 0)
-- Dependencies: 202
-- Name: persona_id_seq; Type: SEQUENCE SET; Schema: persona; Owner: postgres
--

SELECT pg_catalog.setval('persona.persona_id_seq', 25, true);


--
-- TOC entry 2306 (class 0 OID 16439)
-- Dependencies: 192
-- Data for Name: usuario; Type: TABLE DATA; Schema: persona; Owner: postgres
--

COPY persona.usuario (id, usuario, clave, estatus, idpersona, idcarg_pers, fecha, ip) FROM stdin;
1	NOSLEN	123	1	1	1	\N	\N
2	FRANKLINAURA21@GMAIL.COM	12345678	1	19	2	2020-02-20 14:43:37-04	127.0.0.1
\.


--
-- TOC entry 2372 (class 0 OID 0)
-- Dependencies: 203
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: persona; Owner: postgres
--

SELECT pg_catalog.setval('persona.usuario_id_seq', 3, true);


--
-- TOC entry 2329 (class 0 OID 41596)
-- Dependencies: 215
-- Data for Name: codigo_secreto; Type: TABLE DATA; Schema: public; Owner: sisinv
--

COPY public.codigo_secreto (id, codigo, fecha, ip, tipo_, id_persona, correo, estatus) FROM stdin;
6	86776733	2020-02-20 14:41:41-04	127.0.0.1	1	19	franklinaura21@gmail.com	1
7	54150390	2020-02-20 14:42:23-04	127.0.0.1	1	19	franklinaura21@gmail.com	1
\.


--
-- TOC entry 2373 (class 0 OID 0)
-- Dependencies: 214
-- Name: codigo_secreto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sisinv
--

SELECT pg_catalog.setval('public.codigo_secreto_id_seq', 7, true);


--
-- TOC entry 2319 (class 0 OID 16523)
-- Dependencies: 205
-- Data for Name: estatus; Type: TABLE DATA; Schema: public; Owner: sisinv
--

COPY public.estatus (id, nombre, estatus) FROM stdin;
2	Inactivo	1
1	Activo	1
\.


--
-- TOC entry 2374 (class 0 OID 0)
-- Dependencies: 204
-- Name: estatus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sisinv
--

SELECT pg_catalog.setval('public.estatus_id_seq', 1, false);


--
-- TOC entry 2134 (class 2606 OID 16541)
-- Name: pk_id_cargo; Type: CONSTRAINT; Schema: empresa; Owner: sisinv
--

ALTER TABLE ONLY empresa.cargo
    ADD CONSTRAINT pk_id_cargo PRIMARY KEY (id);


--
-- TOC entry 2112 (class 2606 OID 16548)
-- Name: pk_id_empresa; Type: CONSTRAINT; Schema: empresa; Owner: sisinv
--

ALTER TABLE ONLY empresa.empresa
    ADD CONSTRAINT pk_id_empresa PRIMARY KEY (id);


--
-- TOC entry 2132 (class 2606 OID 16558)
-- Name: pk_id_telefono; Type: CONSTRAINT; Schema: empresa; Owner: postgres
--

ALTER TABLE ONLY empresa.telefono
    ADD CONSTRAINT pk_id_telefono PRIMARY KEY (id);


--
-- TOC entry 2136 (class 2606 OID 41437)
-- Name: u_carg; Type: CONSTRAINT; Schema: empresa; Owner: sisinv
--

ALTER TABLE ONLY empresa.cargo
    ADD CONSTRAINT u_carg UNIQUE (nombre);


--
-- TOC entry 2146 (class 2606 OID 41540)
-- Name: pk_id_articulo; Type: CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.articulo
    ADD CONSTRAINT pk_id_articulo PRIMARY KEY (id);


--
-- TOC entry 2118 (class 2606 OID 16586)
-- Name: pk_id_estado; Type: CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.estado
    ADD CONSTRAINT pk_id_estado PRIMARY KEY (id);


--
-- TOC entry 2122 (class 2606 OID 16568)
-- Name: pk_id_factu_inv; Type: CONSTRAINT; Schema: factu_inv; Owner: postgres
--

ALTER TABLE ONLY factu_inv.deta_fac
    ADD CONSTRAINT pk_id_factu_inv PRIMARY KEY (id);


--
-- TOC entry 2120 (class 2606 OID 16588)
-- Name: pk_id_factura; Type: CONSTRAINT; Schema: factu_inv; Owner: postgres
--

ALTER TABLE ONLY factu_inv.factura
    ADD CONSTRAINT pk_id_factura PRIMARY KEY (id);


--
-- TOC entry 2116 (class 2606 OID 16598)
-- Name: pk_id_iva; Type: CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.iva
    ADD CONSTRAINT pk_id_iva PRIMARY KEY (id);


--
-- TOC entry 2150 (class 2606 OID 49793)
-- Name: pk_id_producto; Type: CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.producto
    ADD CONSTRAINT pk_id_producto PRIMARY KEY (id);


--
-- TOC entry 2144 (class 2606 OID 41519)
-- Name: pk_id_proveedor; Type: CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.proveedor
    ADD CONSTRAINT pk_id_proveedor PRIMARY KEY (id);


--
-- TOC entry 2142 (class 2606 OID 33245)
-- Name: pk_id_talla; Type: CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.talla
    ADD CONSTRAINT pk_id_talla PRIMARY KEY (id);


--
-- TOC entry 2114 (class 2606 OID 16628)
-- Name: pk_id_tip_produ; Type: CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.tip_produ
    ADD CONSTRAINT pk_id_tip_produ PRIMARY KEY (id);


--
-- TOC entry 2140 (class 2606 OID 16825)
-- Name: pk_id_carg_pers; Type: CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.carg_pers
    ADD CONSTRAINT pk_id_carg_pers PRIMARY KEY (id);


--
-- TOC entry 2124 (class 2606 OID 16645)
-- Name: pk_id_persona; Type: CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.persona
    ADD CONSTRAINT pk_id_persona PRIMARY KEY (id);


--
-- TOC entry 2128 (class 2606 OID 16656)
-- Name: pk_id_usuario; Type: CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.usuario
    ADD CONSTRAINT pk_id_usuario PRIMARY KEY (id);


--
-- TOC entry 2126 (class 2606 OID 41435)
-- Name: u_cedula; Type: CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.persona
    ADD CONSTRAINT u_cedula UNIQUE (cedula);


--
-- TOC entry 2130 (class 2606 OID 16663)
-- Name: u_usuario; Type: CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.usuario
    ADD CONSTRAINT u_usuario UNIQUE (usuario);


--
-- TOC entry 2148 (class 2606 OID 41604)
-- Name: pk_id_codigo_secreto; Type: CONSTRAINT; Schema: public; Owner: sisinv
--

ALTER TABLE ONLY public.codigo_secreto
    ADD CONSTRAINT pk_id_codigo_secreto PRIMARY KEY (id);


--
-- TOC entry 2138 (class 2606 OID 16536)
-- Name: pk_id_estatus; Type: CONSTRAINT; Schema: public; Owner: sisinv
--

ALTER TABLE ONLY public.estatus
    ADD CONSTRAINT pk_id_estatus PRIMARY KEY (id);


--
-- TOC entry 2151 (class 2606 OID 16549)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: empresa; Owner: sisinv
--

ALTER TABLE ONLY empresa.empresa
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2164 (class 2606 OID 16559)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: empresa; Owner: postgres
--

ALTER TABLE ONLY empresa.telefono
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2165 (class 2606 OID 16689)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: empresa; Owner: sisinv
--

ALTER TABLE ONLY empresa.cargo
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2166 (class 2606 OID 16694)
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: empresa; Owner: sisinv
--

ALTER TABLE ONLY empresa.cargo
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2181 (class 2606 OID 49809)
-- Name: fk_articulo; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.producto
    ADD CONSTRAINT fk_articulo FOREIGN KEY (articulo) REFERENCES factu_inv.articulo(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2152 (class 2606 OID 16629)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.tip_produ
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2159 (class 2606 OID 16714)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: postgres
--

ALTER TABLE ONLY factu_inv.deta_fac
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2156 (class 2606 OID 16719)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.estado
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2157 (class 2606 OID 16739)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: postgres
--

ALTER TABLE ONLY factu_inv.factura
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2154 (class 2606 OID 16749)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.iva
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2172 (class 2606 OID 33246)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.talla
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2173 (class 2606 OID 41520)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.proveedor
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2175 (class 2606 OID 41541)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.articulo
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2178 (class 2606 OID 49794)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.producto
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2158 (class 2606 OID 16744)
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: factu_inv; Owner: postgres
--

ALTER TABLE ONLY factu_inv.factura
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2155 (class 2606 OID 16754)
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.iva
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2153 (class 2606 OID 16769)
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.tip_produ
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2174 (class 2606 OID 41525)
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.proveedor
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2176 (class 2606 OID 41546)
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.articulo
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2179 (class 2606 OID 49799)
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.producto
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2183 (class 2606 OID 49819)
-- Name: fk_proveedor; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.producto
    ADD CONSTRAINT fk_proveedor FOREIGN KEY (proveedor) REFERENCES factu_inv.proveedor(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2180 (class 2606 OID 49804)
-- Name: fk_talla; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.producto
    ADD CONSTRAINT fk_talla FOREIGN KEY (talla) REFERENCES factu_inv.talla(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2182 (class 2606 OID 49814)
-- Name: fk_tip_produ; Type: FK CONSTRAINT; Schema: factu_inv; Owner: sisinv
--

ALTER TABLE ONLY factu_inv.producto
    ADD CONSTRAINT fk_tip_produ FOREIGN KEY (tipo_articulo) REFERENCES factu_inv.tip_produ(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2163 (class 2606 OID 16669)
-- Name: fk_id_cargo; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.usuario
    ADD CONSTRAINT fk_id_cargo FOREIGN KEY (idcarg_pers) REFERENCES empresa.cargo(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2169 (class 2606 OID 16836)
-- Name: fk_id_cargo; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.carg_pers
    ADD CONSTRAINT fk_id_cargo FOREIGN KEY (cargo) REFERENCES empresa.cargo(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2160 (class 2606 OID 16646)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.persona
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2161 (class 2606 OID 16657)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.usuario
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id);


--
-- TOC entry 2170 (class 2606 OID 16841)
-- Name: fk_id_estatus; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.carg_pers
    ADD CONSTRAINT fk_id_estatus FOREIGN KEY (estatus) REFERENCES public.estatus(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2162 (class 2606 OID 16664)
-- Name: fk_id_persona; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.usuario
    ADD CONSTRAINT fk_id_persona FOREIGN KEY (idpersona) REFERENCES persona.persona(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2167 (class 2606 OID 16826)
-- Name: fk_id_persona; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.carg_pers
    ADD CONSTRAINT fk_id_persona FOREIGN KEY (persona) REFERENCES persona.persona(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2168 (class 2606 OID 16831)
-- Name: fk_id_usuario; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.carg_pers
    ADD CONSTRAINT fk_id_usuario FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2171 (class 2606 OID 16846)
-- Name: fk_id_usuario_re; Type: FK CONSTRAINT; Schema: persona; Owner: postgres
--

ALTER TABLE ONLY persona.carg_pers
    ADD CONSTRAINT fk_id_usuario_re FOREIGN KEY (usuario) REFERENCES persona.usuario(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2177 (class 2606 OID 41605)
-- Name: fk_id_persona; Type: FK CONSTRAINT; Schema: public; Owner: sisinv
--

ALTER TABLE ONLY public.codigo_secreto
    ADD CONSTRAINT fk_id_persona FOREIGN KEY (id_persona) REFERENCES persona.persona(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2339 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2020-11-08 10:56:08

--
-- PostgreSQL database dump complete
--

\connect template1

SET default_transaction_read_only = off;

--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.16
-- Dumped by pg_dump version 9.5.16

-- Started on 2020-11-08 10:56:08

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2095 (class 0 OID 0)
-- Dependencies: 2094
-- Name: DATABASE template1; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE template1 IS 'default template for new databases';


--
-- TOC entry 1 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2098 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 2097 (class 0 OID 0)
-- Dependencies: 6
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2020-11-08 10:56:09

--
-- PostgreSQL database dump complete
--

-- Completed on 2020-11-08 10:56:09

--
-- PostgreSQL database cluster dump complete
--

