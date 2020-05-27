<?php

namespace Modelos;

class Repositorio
{
    private static $status = [
        ['id_status' => 1, 'descricao' => 'Novo'],
        ['id_status' => 2, 'descricao' => 'Em tratamento'],
        ['id_status' => 3, 'descricao' => 'Em Analise'],
        ['id_status' => 4, 'descricao' => 'Fechado'],
    ];

    private static $ticket = [
        ['id_ticket' => '00001', 'data' => 1589316357, 'id_status' => 1, 'titulo' => 'Erro de configuração do roteador'],
        ['id_ticket' => '00002', 'data' => 1589316334, 'id_status' => 4, 'titulo' => 'Queda de Circuito'],
        ['id_ticket' => '00004', 'data' => 1589316312, 'id_status' => 2, 'titulo' => 'Troca de interface'],
        ['id_ticket' => '00005', 'data' => 1589316325, 'id_status' => 2, 'titulo' => 'Erro de configuração do roteador'],
        ['id_ticket' => '00006', 'data' => 1589316349, 'id_status' => 3, 'titulo' => 'Queda de Circuito'],
        ['id_ticket' => '00007', 'data' => 1589316334, 'id_status' => 3, 'titulo' => 'Troca de interface'],
        ['id_ticket' => '00008', 'data' => 1589316362, 'id_status' => 3, 'titulo' => 'Queda de Circuito'],
        ['id_ticket' => '00009', 'data' => 1589316287, 'id_status' => 2, 'titulo' => 'Queda de Circuito'],
        ['id_ticket' => '00010', 'data' => 1589316340, 'id_status' => 2, 'titulo' => 'Queda de Circuito'],   
        ['id_ticket' => '00011', 'data' => 1589316336, 'id_status' => 2, 'titulo' => 'Erro de configuração do roteador'],
    ];

    private static function listar($lista, $instanciador, $id = null)
    {
        if ($id) {
            foreach (self::$$lista as $item) {
                if ($item["id_{$lista}"] == $id) {
                    return $instanciador($item);
                }
            }
            return null;
        }

        return array_map(function ($s) use ($instanciador) {
            return $instanciador($s);
        }, self::$$lista);
    }

    public static function listarStatus($id = null)
    {
        $instanciador = function (array $status) {
            return new Status($status['id_status'], $status['descricao']);
        };

        return self::listar('status', $instanciador, $id);
    }

    public static function listarTickets($id = null)
    {
        $instanciador = function (array $ticket) {
            return new Ticket($ticket['id_ticket'], $ticket['data'], 
                self::listarStatus($ticket['id_status']), $ticket['titulo']);
        };

        return self::listar('ticket', $instanciador, $id);
    }
}