<?php
namespace Spigo\Lorem;

class Lorem
{
    private $result;

    public function __construct(){
        $this->return = array();
    }

    public function paragraph()
    {
        @$this->return[] = $this->baseParagraphs()[0];
        return $this;
    }
    public function paragraphs($count)
    {
        $numberOfParagraphs = count($this->baseParagraphs());
        for ($i = 0; $i < $count; $i++) {
            $index = $i % $numberOfParagraphs;

            @$this->return[] = $this->baseParagraphs()[$index];
        }

        return $this;
    }
    /**
     * @param int $width
     * @param null $height
     * @param array $attributes
     * @return string
     */
    public function image($width = 1024, $height = null, $attributes = [])
    {
        if (is_null($height)) {
            $height = $width;
        }

        @$this->return[] = '<img width="'.$width.'" height="'.$height.'" src="https://picsum.photos/' . $width . '/' . $height .
        '" ' . $this->addAttributes($attributes) . '>';

        return $this;
    }

    /**
     * @param int $width
     * @param null $height
     * @return string
     */
    public function imageUrl($width = 1024, $height = null)
    {
        if (is_null($height)) {
            $height = $width;
        }

        @$this->return[] = 'https://picsum.photos/' . $width . '/' . $height . '';
        return $this;
    }

    /**
     * @param $attributes
     * @return string
     */
    private function addAttributes($attributes)
    {
        $attr = ' ';

        foreach ($attributes as $attribute => $value) {
            if (is_integer($attribute)) {
                $attr .= $value . ' ';
            } else {
                $attr .= $attribute . '="' . $value . '" ';
            }
        }

        return rtrim($attr);
    }
    /**
     *
     */
    public function get(){
        $retorn = implode('\n', $this->return);
        $this->return = array();
        return $retorn;
    }

    public function getHtml(){
        $newReturn = '';
        foreach ($this->return as $key => $value) {
            $newReturn .= '<p>' .
                          $value .
                          '</p>';
        }
        $this->return = array();
        return $newReturn;
    }

    public function words($count = 1)
    {
        $newReturn = array();
        $input = $this->baseWords();
        foreach(array_rand($input, $count) as $key)
        {
            $newReturn[] = $input[$key];
        }
        $this->return[] = implode(' ', $newReturn);
        return $this;
    }
    private function baseWords()
    {
        return explode(' ',strtolower(str_replace(['.',','],'', $this->baseParagraphs()[0])));
    }

    /**
     * @return array
     */
    private function baseParagraphs()
    {
        return [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non rhoncus odio. Aliquam dolor velit, consectetur vehicula imperdiet eget, gravida sit amet sem. In hac habitasse platea dictumst. In iaculis nibh vitae metus ullamcorper, nec hendrerit libero scelerisque. Suspendisse quis nulla a sem condimentum lobortis. Vestibulum commodo volutpat quam, sit amet blandit lectus auctor vel. Praesent sed laoreet orci, sit amet tincidunt felis. Curabitur tempus molestie lectus, et ornare ante hendrerit in. Phasellus consectetur orci sem, eget pulvinar enim condimentum et. Nunc imperdiet lorem eget urna pellentesque, non luctus enim pharetra. Nunc ex tellus, posuere sit amet finibus vel, sodales eget orci. Curabitur et arcu id ex suscipit imperdiet.',
            'Nunc sit amet accumsan arcu. Vestibulum a quam diam. Nulla mollis mauris id tempus placerat. Phasellus sit amet ligula eu ante commodo ullamcorper. Vestibulum mollis dui eu libero mattis, sed cursus nisl laoreet. Fusce maximus a nisi a rutrum. Donec sed ultrices mauris. In iaculis, sapien vel tristique hendrerit, odio quam iaculis dui, eget porttitor felis leo quis nulla. Nunc et luctus mi. Etiam eu molestie magna. Sed nisl odio, congue non molestie eu, hendrerit et orci. Quisque a elit eu ligula accumsan dictum. Phasellus mattis sapien orci, vitae malesuada lacus cursus nec.',
            'Nam eleifend varius metus, vel accumsan magna rutrum vitae. In et justo urna. Nunc eget ex id massa convallis porta. Duis dui nisl, commodo ut leo eget, consectetur auctor elit. Vestibulum mollis, quam et efficitur ultricies, metus justo blandit sapien, tristique fringilla erat dui eu purus. Proin vitae posuere sapien, at fermentum tortor. Sed semper urna id lectus placerat tincidunt. Nullam iaculis sollicitudin congue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus magna est, semper aliquet consectetur auctor, tempus quis eros. Aenean ac ultrices nunc. Nullam suscipit massa vitae nisi tristique, in interdum ipsum egestas.',
            'Vestibulum pulvinar accumsan nulla. Phasellus convallis vulputate nibh sed pretium. Aenean tellus nunc, tristique eu fringilla sed, dictum ac metus. Quisque aliquet purus sit amet lorem bibendum laoreet. Nam dictum fermentum lacus vel commodo. Nunc facilisis quam vitae nulla suscipit vehicula. Curabitur et justo risus. Duis diam enim, mollis sit amet sagittis eleifend, hendrerit a ante. Curabitur porttitor enim et pulvinar laoreet. Praesent erat metus, commodo eget euismod sed, ullamcorper eu nulla.',
            'Curabitur aliquet diam ultrices tincidunt suscipit. Nullam rhoncus risus et accumsan dictum. Fusce non orci ut turpis ultricies ultricies. Vestibulum eu sodales dolor. Proin vel leo erat. Sed venenatis nec sem eu cursus. Maecenas eros lectus, consectetur vitae ullamcorper ut, congue in ex.',
            'Nam tempor rutrum purus, et ultricies massa tincidunt dictum. Maecenas bibendum tellus ac sollicitudin convallis. Pellentesque tempus fermentum mauris, vitae tincidunt mi. Nunc rutrum nec ligula vel facilisis. Fusce pretium lacus urna, pharetra porttitor urna laoreet sed. Sed quis est eros. Proin eu libero venenatis ligula hendrerit gravida. Donec sed ultrices turpis. Proin tortor ex, sodales ac metus eu, feugiat ultrices justo. Sed sed laoreet nibh, sit amet tincidunt urna. Nunc at faucibus leo, malesuada feugiat dui.',
            'Nulla iaculis porta mauris vitae gravida. Vestibulum accumsan felis a lacus facilisis, sit amet accumsan lectus ultricies. Ut eget mauris lacinia lectus imperdiet auctor vitae non arcu. Quisque eu dolor at odio sagittis semper. Suspendisse non cursus orci. Vestibulum finibus ex non neque maximus ultrices. Vivamus ornare sapien nec mauris semper, eget posuere arcu cursus. Ut neque justo, fringilla eget lacinia sed, mollis commodo elit. Nulla eget elit sit amet nisi placerat venenatis. Donec nec ante sed arcu elementum ullamcorper. Aliquam eget congue purus, in dictum nibh. Phasellus porta felis quis elit interdum viverra. Suspendisse aliquam, purus vitae dignissim sagittis, turpis turpis rhoncus sem, ac condimentum ex mauris rutrum nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla sapien ligula, imperdiet placerat metus a, condimentum vulputate urna. Nunc molestie lorem vitae diam maximus fringilla.',
            'Nullam sit amet metus ac nisi commodo dapibus porttitor non arcu. Quisque ornare, diam id imperdiet rutrum, justo elit luctus sapien, eu bibendum velit massa id erat. Etiam venenatis, turpis eget maximus imperdiet, libero ligula volutpat nisl, quis mollis enim purus in metus. Integer dictum malesuada lacus in volutpat. In sodales, ante ac bibendum dignissim, nunc felis maximus nisl, id ultrices quam neque ut erat. Phasellus condimentum enim a fringilla vestibulum. Etiam eu nisi a est dapibus aliquam a at metus. Nulla bibendum, nulla in venenatis congue, dui diam mollis diam, vel convallis arcu risus in purus. Duis quis lectus auctor, mollis arcu a, ultrices sapien. Pellentesque lacus odio, laoreet nec gravida eget, eleifend non libero.',
            'Nullam sed vestibulum justo. Nullam placerat mauris sit amet dui efficitur dapibus. In dapibus ante at eros sodales sodales. Nulla viverra aliquam dignissim. Curabitur tincidunt dui et erat placerat posuere. Phasellus erat odio, facilisis a tortor rhoncus, euismod pretium lacus. Nunc mattis dignissim auctor.',
            'Nunc elementum ac ante vitae posuere. Curabitur iaculis elit ut tincidunt placerat. Donec congue tristique luctus. Suspendisse tincidunt ligula tellus, semper elementum purus commodo ac. Sed tincidunt justo ut nunc lacinia, eget consequat mauris tempus. Etiam in nisi a elit facilisis tempus et in elit. Sed at lorem varius enim maximus vestibulum. Morbi sit amet fringilla odio.',
        ];
    }

}
