<?php

class News
{
     public static function getNewsItemById($id)
    {

        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);

            $newsItem = $result->fetch(PDO::FETCH_ASSOC);

            return $newsItem;
        }
    }

    public static function getNewsList()
    {
        $db = Db::getConnection();

        $result = $db->query("  select id, title, date, short_content 
                                from news 
                                order by date desc
                                limit 10 ");

        $i = 0;
        while ($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }
}