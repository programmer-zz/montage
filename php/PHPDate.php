<?php
class PHPDate
{
	/**
	 * 周开始于
	 *
	 * @var int
	 */
	public $weekStart;
	
	/**
	 * 每月天数
	 *
	 * @var int
	 */
	private $daysInMonth;
	
	/**
	 * 月英文名
	 *
	 * @var String
	 */
	private $monthNames;
	
	/**
	 * 星期英文名
	 *
	 * @var unknown_type
	 */
	private  $dayNames;

	/**
	 * 月中文名
	 *
	 * @var String
	 */
	private $monthNamesCN;
	
	/**
	 * 星期中文名
	 *
	 * @var String
	 */
	private  $dayNamesCN;
	
	function __construct()
	{
		$this->weekStart = 0; //周一
		$this->daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		$this->monthNames = array("January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December");
		$this->dayNames = array("S", "M", "T", "W", "T", "F", "S");
		$this->monthNamesCN = array("一月", "二月", "三月", "四月", "五月", "六月",
                            "七月", "八月", "九月", "十月", "十一月", "十二月");
		$this->dayNamesCN = array("日", "一", "二", "三", "四", "五", "六");		
	}
	
	/**
	 * 设置时区
	 *
	 */
	function setTimezone()
	{
		
	}
	
	/**
	 * 获取周区间
	 *
	 * @param int $offset
	 */
	function getWeek($offset=0)
	{
		$rs = array();
	    $timenow = time()+3600*8;
	    $day = strftime("%w",$timenow); //当前星期第几天,0为星期天
	    $date1 = date('Y-m-d',strtotime(" -$day days")); //本周开始的日期
	    $nowstart = strtotime($date1); //本周开始和结束的时间戳,
	    $nowend = $nowstart+3600*24*7-1;//3600秒,24小时,一周7天,结束时间再减1秒
	    for($i=7; $i>0; $i--) {
	        $theday = $nowstart-3600*24*$i; //上周开始和结束的时间戳
	        $theday2 = date("Y-m-d", $theday);
	        array_push($rs, $theday2);
	    }
	    return $rs;
	}
	
	/**
	 * 获取月区间
	 *
	 * @param int $offset
	 */
	function getMonth($offset)
	{
		
	}
	
	/**
	 * 获取日
	 *
	 * @param int $offset
	 */
	function getDay($offset)
	{
		
	}
	
	function __destruct()
	{
		
	}

}
?>
