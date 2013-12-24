<?php

class StoryTable extends Doctrine_Table {
    public function getPublicStories() {
        $q = $this->createQuery('s')
                ->where('s.is_active = true')
                ->where('s.is_public  = true')
                ->orderBy('s.id DESC');

        return $q->execute();
    }

    public function getPrivateStoryCount() {
        $q = $this->createQuery('s')
                ->where('s.is_active  = true')
                ->where('s.is_public  = false')
                ->orderBy('s.id DESC');

        return $q->count();
    }

    public function retrieveBySlug($slug) {
        $q= $this->createQuery('s')
            ->andWhere('s.slug = ?', $slug);
        return $q->fetchOne();
    }

    public function getByTagName($tag) {
        $q= $this->createQuery('s')
	    ->addSelect('s.*')
            ->from('Story s, Tagging t')
	    ->where('t.taggable_id = s.id AND t.taggable_model = ?', 'Story')
            ->andWhere('s.is_public = true')
            ->andWhere('s.is_active  = true');
        return $q->execute();
    }

    public function getPopularTags() {
        $q = Doctrine_Query::create()->from('Tag t, Tagging z, Story s')
                ->addSelect('t.*, count(s.id) as nb')
                ->where('t.id = z.tag_id')
                ->andWhere('z.taggable_model = ?', 'Story')
                ->andWhere('z.taggable_id = s.id')
                ->andWhere('s.is_active = true')
                ->andWhere('s.is_public = true')
                ->groupBy('t.id')
                ->orderBy('nb DESC')
                ->limit(50)
                ;

        return $q->execute();
    }


}