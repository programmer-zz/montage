<?php
class PHPDate
{
	/**
	 * �ܿ�ʼ��
	 *
	 * @var int
	 */
	public $weekStart;
	
	/**
	 * ÿ������
	 *
	 * @var int
	 */
	private $daysInMonth;
	
	/**
	 * ��Ӣ����
	 *
	 * @var String
	 */
	private $monthNames;
	
	/**
	 * ����Ӣ����
	 *
	 * @var unknown_type
	 */
	private  $dayNames;

	/**
	 * ��������
	 *
	 * @var String
	 */
	private $monthNamesCN;
	
	/**
	 * ����������
	 *
	 * @var String
	 */
	private  $dayNamesCN;
	
	function __construct()
	{
		$this->weekStart = 0; //��һ
		$this->daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		$this->monthNames = array("January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December");
		$this->dayNames = array("S", "M", "T", "W", "T", "F", "S");
		$this->monthNamesCN = array("һ��", "����", "����", "����", "����", "����",
                            "����", "����", "����", "ʮ��", "ʮһ��", "ʮ����");
		$this->dayNamesCN = array("��", "һ", "��", "��", "��", "��", "��");		
	}
	
	/**
	 * ����ʱ��
	 *
	 */
	function setTimezone()
	{
		
	}
	
	/**
	 * ��ȡ������
	 *
	 * @param int $offset
	 */
	function getWeek($offset=0)
	{
		$rs = array();
	    $timenow = time()+3600*8;
	    $day = strftime("%w",$timenow); //��ǰ���ڵڼ���,0Ϊ������
	    $date1 = date('Y-m-d',strtotime(" -$day days")); //���ܿ�ʼ������
	    $nowstart = strtotime($date1); //���ܿ�ʼ�ͽ�����ʱ���,
	    $nowend = $nowstart+3600*24*7-1;//3600��,24Сʱ,һ��7��,����ʱ���ټ�1��
	    for($i=7; $i>0; $i--) {
	        $theday = $nowstart-3600*24*$i; //���ܿ�ʼ�ͽ�����ʱ���
	        $theday2 = date("Y-m-d", $theday);
	        array_push($rs, $theday2);
	    }
	    return $rs;
	}
	
	/**
	 * ��ȡ������
	 *
	 * @param int $offset
	 */
	function getMonth($offset)
	{
		
	}
	
	/**
	 * ��ȡ��
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
