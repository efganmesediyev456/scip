<?php
/*
 * Copyright (c) 2022.
 *
 * SAFAROFF Agency. (https://safaroff.com) All Rights Reserved.
 *
 * Added by Samir Mammadhasanov (https://samirmhsnv.dev)
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace App\Traits;

trait HasUserAgent
{
    public string $parsedAgent;

    protected string $browserName;
    protected string $platform;
    private string $ub;
    private string $version;
    private string $pattern;

    private function parsePlatform()
    {
        //First get the platform?
        if (preg_match('/linux/i', $this->user_agent)) {
            $this->platform = 'Linux';
        } elseif (preg_match('/macintosh|mac os x/i', $this->user_agent)) {
            $this->platform = 'macOS';
        } elseif (preg_match('/windows|win32/i', $this->user_agent)) {
            $this->platform = 'Windows';
        }
    }

    private function parseBrowser()
    {
        // Next get the name of the useragent yes separately and for good reason
        if (preg_match('/MSIE/i', $this->user_agent) && ! preg_match('/Opera/i', $this->user_agent)) {
            $this->browserName = 'Internet Explorer';
            $this->ub = 'MSIE';
        } elseif (preg_match('/Firefox/i', $this->user_agent)) {
            $this->browserName = 'Mozilla Firefox';
            $this->ub = 'Firefox';
        } elseif (preg_match('/Chrome/i', $this->user_agent)) {
            $this->browserName = 'Google Chrome';
            $this->ub = 'Chrome';
        } elseif (preg_match('/Safari/i', $this->user_agent)) {
            $this->browserName = 'Apple Safari';
            $this->ub = 'Safari';
        } elseif (preg_match('/Opera/i', $this->user_agent)) {
            $this->browserName = 'Opera';
            $this->ub = 'Opera';
        } elseif (preg_match('/Netscape/i', $this->user_agent)) {
            $this->browserName = 'Netscape';
            $this->ub = 'Netscape';
        }
    }

    private function parseVersion()
    {
        // finally, get the correct version number
        $known = ['Version', $this->ub, 'other'];
        $this->pattern = '#(?<browser>'.implode('|', $known).')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

        preg_match_all($this->pattern, $this->user_agent, $matches);

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($this->user_agent, 'Version') < strripos($this->user_agent, $this->ub)) {
                $this->version = $matches['version'][0];
            } else {
                $this->version = $matches['version'][1];
            }
        } else {
            $this->version = $matches['version'][0];
        }

        // check if we have a number
        if ($this->version == null || $this->version == '') {
            $this->version = '?';
        }
    }

    public function deviceType(): string
    {
        $tablet_browser = 0;
        $mobile_browser = 0;

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower(request()->userAgent()))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower(request()->userAgent()))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT'] ?? ''), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr(request()->userAgent(), 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-');

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower(request()->userAgent()), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }

        if ($tablet_browser > 0) {
            return 'tablet';
        } elseif ($mobile_browser > 0) {
            return 'mobile';
        }

        return 'desktop';
    }
}
