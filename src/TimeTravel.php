<?php
/**
 * Created by PhpStorm.
 * User: wilder20
 * Date: 28/09/18
 * Time: 14:15
 */

class TimeTravel
{
    /**
     * @var DateTime
     */
    
    private $start;
    /**
     * @var DateTime
     */
    
    private $end;
    /**
     * @return DateTime
     */
    
    private $interval;
    
    public function getStart():DateTime
    {
        return $this->start;
    }
    
    /**
     * @param DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }
    
    /**
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
    
    /**
     * @param DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }
    
    public function getTravelInfo(DateTimeInterface $start, DateTime $end):string
    {
        $ecart = $start->diff($end);
        $output = 'Il y a '.$ecart->format('%Y').' années, '.$ecart->format('%M').' mois, '.$ecart->format('%D').'jours, '.$ecart->format('%H').' heures, '.$ecart->format('%I').' minutes et '.$ecart->format('%S').' secondes entre les deux dates'."\n";
        return $output."\n";
    }
    
    public function findDate(DateTime $start, string $interval):string
    {
        $start2=$start;
        $start2->add(DateInterval::createFromDateString($interval));
        return $start2->format('Y-m-d')."\n\n";
    }
    
    public function backToFutureStepByStep(DatePeriod $step)
    {
        $stepList=[];
        foreach($step as $key =>$dt) {
            $stepList[$key]=$dt->format('M d Y A H:i');
        }
        return $stepList;
    }
    
}