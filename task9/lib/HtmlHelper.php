<?php
class HtmlHelper
{
    public static function makeSelect(array $opts, $postName, $size=0, $multiple=false, $selected=array())
    {
        $selBlock = '<select ';
            if($multiple)
            {
				if($size == 0)
				{
					$size = count($opts);
				}
                $selBlock .= 'multiple size='.$size.' name='.$postName.'[]>';
                
            }
            else
            {
                $selBlock .='name='.$postName.' >';
            }


		if($multiple)
		{
			foreach($opts as $k => $v)
			{
				if(!empty($selected))
				{
					if(array_search($v, $selected) == $k)
					{
						$selBlock.= '<option selected value='.$k.'>'.$v.'</option>';
					}
				
					else
					{
						$selBlock .='<option value='.$k.'>'.$v.'</option>';
					}
				}
				else
				{
					$selBlock .='<option value='.$k.'>'.$v.'</option>';
				}
			}
		}
		else
		{
			if(count($selected) == 1)
			{
				$sel=array_shift($selected);
				foreach($opts as $k => $v)
				{
					if($sel == $v)
					{
						$selBlock.= '<option selected value='.$k.'>'.$v.'</option>';
					}
					else
					{
						$selBlock .='<option value='.$k.'>'.$v.'</option>';
					}
				}
			}
			else
			{
				foreach($opts as $k => $v)
				{
					$selBlock .='<option value='.$k.'>'.$v.'</option>';
				}
			}
		}
       $selBlock .='</select>';
       return $selBlock;

    }


    public static function makeTable(array $data, $tableName='', $align ='center', $pad='5')
    {
		$padding = $pad.'px';
		$headPadding = $pad * 2;
		$headPadding = $headPadding.'px';
        $table="<table style=text-align:$align; >";
        if(($tableName))
        {
            $table .='<tr><th style= padding:'.$headPadding.'>'.$tableName.'</th></tr>';
        }


        foreach ($data as $row)
        {
			$table .='<tr>';
            foreach($row as $k => $val)
            {
                $table .='<td style=padding:'.$padding.'>'.$k.'</td><td style=padding:'.$padding.'>'.$val.'</td>';
            }
            $table .='</tr>';
        }
        $table .='</table>';
		return $table;
    }


    public static function makeList(array $data,$ul=true)
    {
		$list ='';
        if($ul)
        {
            $list .='<ul>';
        }
        else
        {
            $list .='<ol>';
        }
        foreach($data as $row)
        {
            $list .='<li>'.$row.'</li>';
        }
        if($ul)
        {
            $list .='</ul>';
        }
        else
        {
            $list .='</ol>';
        }
        
        return $list;    

    }
    public static function makeDl(array $data)
    {
        if(!empty($data))
        {
            $dl = '<dl>';
            foreach($data as $dt => $dd)
            {
                $dl .='<dt>'.$dt.'</dt><dd>'.$dd.'</dd>';
            }
            $dl .='</dl>';
        }
        return $dl;
    }


	/**
	 *
	 * @param array $data
	 * @param string $checked// key of default selected element of input array $data
	 * @param string $postName
	 * @param bool $inline
	 * @return string
	 */
    public static function makeRadioBox(array $data, $checked, $postName,$inline=true)
    {
		$radio = '';
        if(!empty($data))
        {
			if($inline === true)
			{
				foreach($data as $n => $v)
				{
					if($checked == $n)
					{
						$radio .='<input checked type=radio  name='.$postName.' value='.$v.'>'.$v;
					}
					 else
					{
						$radio.='<input type=radio name='.$postName.' value='.$v.'>'.$v;
					}
				}
			}
			if($inline === false)
			{
				foreach($data as $n => $v)
				{
					if($checked == $n)
					{
						$radio .='<p><input checked type=radio  name='.$postName.' value='.$v.'>'.$v.'</p>';
					}
					 else
					{
						$radio.='<p><input type=radio name='.$postName.' value='.$v.'>'.$v.'</p>';
					}
				}
			}
        }
		return $radio;
    }

	/**
	 *
	 * @param array $data
	 * @param bool $inline
	 * @param array $checked
	 * @return string
	 */
	public static function makeCheckBox(array $data, $inline=true, $checked=array())
    {
		$check = '';
        if(!empty($data))
            {
				if($inline)
				{
					foreach($data as $n => $v)
					{
						if($n == (array_search($v, $checked)))
						{
							$check  .='<input checked type=checkbox  name='.$n.' value='.$v.'>'.$v;
						}
						 else
						{
							$check.='<input type=checkbox name='.$n.' value='.$v.'>'.$v;
						}
					}
				}
				else
				{
					foreach($data as $n => $v)
					{
						if($n == (array_search($v, $checked)))
						{
							$check .='<p><input checked type=checkbox  name='.$n.' value='.$v.'>'.$v.'</p>';
						}
						 else
						{
							$check.='<p><input type=checkbox name='.$n.' value='.$v.'>'.$v.'</p>';
						}
					}
				}
           }
		return $check;
    }

}    
?>
